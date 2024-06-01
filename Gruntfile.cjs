module.exports = function (grunt) {
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    tslint: {
      options: {
        configuration: 'tslint.yaml',
        // This is necessary for rules related to type-checking.
        project: 'tsconfig.json5',
        // If set to true, tslint errors will be reported, but not
        // fail the task.  If set to false, tslint errors will be
        // reported, and the task will fail.
        force: false,
        fix: false,
      },
      files: {
        src: [
          "client/**/*.ts",

          // XXX: Without this, we get an error about .d.ts files not being part
          // of the project; but we do want to lint them!
          "!client/**/*.d.ts",
        ],
      },
    },
    uglify: {
      options: {
        banner:
          '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',
      },
      build: {
        src: [
          // 'tmp/assets_cards.js',
          'tmp/client/*.js',
        ],
        dest: 'build/<%= pkg.name %>.js',
      },
    },
    copy: {
      tsconfig: {
        files: [
          {
            expand: true,
            cwd: './',
            src: ['tsconfig.json5'],
            dest: 'tmp/',
            rename: (dest, src) => {
              return dest + '/' + src.replace(/\.json5$/, '.json');
            },
            filter: 'isFile',
          },
        ],
      },
      client_ts_sources: {
        files: [
          {
            expand: true,
            cwd: 'client/',
            src: ['**/*.ts'],
            dest: 'tmp/client/',
            filter: 'isFile',
          },
        ],
      },
      server_sources: {
        files: [
          {
            expand: true,
            cwd: 'server/modules/',
            src: ['**/*.php', '!**/*Test.php', '!Test/**'],
            dest: 'build/modules/php/',
            filter: 'isFile',
          },
          {
            expand: true,
            cwd: 'server/',
            src: ['*.php'],
            dest: 'build/',
            filter: 'isFile',
          },
          // {expand: true, cwd: 'tmp/', src: ['card_data.inc.php'], dest: 'build/modules/php/', filter: 'isFile'},
          {
            expand: true,
            cwd: 'server/',
            src: ['dbmodel.sql'],
            dest: 'build/',
            filter: 'isFile',
          },
          {
            expand: true,
            cwd: 'server/',
            src: ['*.json'],
            dest: 'build/',
            filter: 'isFile',
          },
          {
            expand: true,
            cwd: 'server/',
            src: ['*.tpl'],
            dest: 'build/',
            filter: 'isFile',
          },
        ],
      },
    },
    // shell: {
    //     deploy: {
    //         command: "lftp sftp://Oberstille@1.studio.boardgamearena.com -e \"mirror --reverse --parallel=10 --delete $PWD/build/ effortlesswc/; exit\"",
    //     },
    // },
    jsonlint: {
      bga_metadata: {
        src: ['server/*.json'],
      },
      tsconfig: {
        src: ['tsconfig.json5'],
        options: {
          mode: 'json5',
        },
      },
      // The source "tsconfig.json5" is copied here.
      output_tsconfig: {
        src: ['tmp/tsconfig.json'],
        options: {
          mode: 'json5',
          prettyPrint: true,
          trimTrailingCommas: true,
          enforceDoubleQuotes: true,
          pruneComments: true,
          indent: 2,
        },
      },
    },
    cssmin: {
      target: {
        options: {
          relativeTo: './build/',
          target: './build/',
          rebase: true,
          // mergeIntoShorthands: false,
        },
        files: {
          'build/effortlesswc.css': [
            'client/*.css',
            'tmp/effortlesswc.*.css',
            'assets/effortlesswc.*.css',
          ],
        },
      },
    },
    ts: {
      default: {
        tsconfig: './tmp/tsconfig.json',
      },
      // src: ["**/*.ts", "!node_modules/**"],
    },
    prettier: {
      // For this code!
      gruntfile: {
        options: {
          configFile: './prettierrc.ts.toml',
        },
        files: {
          'Gruntfile.cjs': 'Gruntfile.cjs',
        },
      },
      client_ts: {
        options: {
          configFile: './prettierrc.ts.toml',
        },
        src: ['client/**/*.ts'],
      },
      client_css: {
        options: {
          configFile: './prettierrc.css.toml',
        },
        src: ['client/**/*.css'],
      },
    },

    shell: {
      // The prettier-php plugin causes module loading errors when we
      // try to define a grunt-prettier task, so we use this
      // workaround.
      prettier_server_php: {
        command:
          "find server -iname '*.php' -print0 | xargs -0 -n50 npm run prettier -- --config ./prettierrc.php.toml --write",
      },
      phan: {
        // N.B.: When running manually, I'd probably do `docker run -it --rm ...`.
        //
        // This will fail if any warnings are emitted.
        command:
        'mkdir -p tmp/phan ; docker run -i --rm -v $PWD/server:/src -v $PWD/phan.config.php:/src/phan.config.php:ro -v $PWD/tmp/phan:/output -v $PWD/wclib/bga-stubs:/wclib/bga-stubs:ro wardcanyon/localarena-testenv:latest phan --config-file=/src/phan.config.php --progress-bar -o /output/analysis.txt ; PHAN_EXIT_CODE=$? ; cat tmp/phan/analysis.txt ; $(exit $PHAN_EXIT_CODE)',
      },
    },
  });

  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-shell');
  grunt.loadNpmTasks('grunt-jsonlint');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-ts');
  grunt.loadNpmTasks('grunt-prettier');
  grunt.loadNpmTasks('grunt-tslint');

  grunt.registerTask('phan', ['shell:phan']);

  grunt.registerTask('lint:client', ['tslint']);

  grunt.registerTask('client', [
    'lint:client',
    'uglify',
    'cssmin',
    'build-ts',
    'uglify',
  ]);

  grunt.registerTask('tsconfig', [
    'jsonlint:tsconfig', // Lint (but don't modify) the source tsconfig.
    'copy:tsconfig',
    'jsonlint:output_tsconfig', // This rewrites the JSON5 input as plain ol' JSON.
  ]);

  // These steps are the actual TypeScript build.
  grunt.registerTask('build-ts', [
    'copy:client_ts_sources',
    'tsconfig',
    'ts',
  ]);

  grunt.registerTask('lint:server', ['jsonlint:bga_metadata', 'phan']);

  grunt.registerTask('server', ['lint:server', 'copy:server_sources']);

  grunt.registerTask('fix', ['prettier', 'shell:prettier_server_php']);

  grunt.registerTask('default', ['fix', 'server', 'client']);
};
