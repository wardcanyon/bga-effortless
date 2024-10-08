/*
  Ruby setup for Sass:

  - brew install rbenv ruby-build
  - Add this to ~/.zshrc or ~/.zshenv (and then source shell env):
    eval "$(rbenv init - zsh)"

  - `rbenv install -l` (to see versions) and then `rbenv install 3.3.2` (to install)

  - And then `rbenv local 3.3.2` to set local version for the project directory (though that obviously doesn't need to be repeated when setting up a new machine).

  - gem install bundler
  - gem update --system
  - gem install sass
  */

module.exports = function (grunt) {
  let phpunit_args = [];
  if (grunt.option('phpunit-filter') !== undefined) {
    phpunit_args = ['--filter="' + grunt.option('phpunit-filter') + '"'];
  }

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
          'client/**/*.ts',

          // XXX: Without this, we get an error about .d.ts files not being part
          // of the project; but we do want to lint them!
          '!client/**/*.d.ts',
        ],
      },
    },
    uglify: {
      options: {
        banner:
          '/*! <%= pkg.name %> <%= grunt.template.today("yyyy-mm-dd") %> */\n',

        // // XXX: Need to figure out how to combine multiple source-maps.
        // sourceMap: true,
        // sourceMapName: 'build/effortless.js.map',
        // sourceMapIn: 'tmp/client/**/*.js.map',

        // For more development-friendly output:
        mangle: false,
      },
      build: {
        src: [
          // 'tmp/assets_cards.js',
          'tmp/client/*.js',
        ],
        dest: 'build/effortless.js',
      },
    },
    copy: {
      assets: {
        files: [
          {
            expand: true,
            cwd: './assets',
            src: ['**/*.jpg', '**/*.png', '**/*.webp'],
            dest: 'build/img/',
            filter: 'isFile',
          },
        ],
      },
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
            src: ['**/*.ts', '**/*.js'],
            dest: 'tmp/client/',
            filter: 'isFile',
          },
          {
            expand: true,
            cwd: 'assets/',
            src: ['**/*.ts', '**/*.js'],
            dest: 'tmp/client/',
            filter: 'isFile',
          },
        ],
      },
      client_ts_build: {
        files: [
          {
            expand: true,
            cwd: 'tmp/client/',
            src: ['effortless.js', 'effortless.js.map'],
            dest: 'build/',
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
            src: [
              '*.php',
              // This file is now translated into JSON.
              '!gameoptions.inc.php',
            ],
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
          {
            expand: true,
            cwd: 'wclib/php/',
            src: ['**/*.php', '!**/*Test.php', '!Test/**'],
            dest: 'build/modules/php/WcLib/',
            filter: 'isFile',
          },
          {
            expand: true,
            cwd: 'assets/',
            src: ['**/*.php'],
            dest: 'build/modules/php/',
            filter: 'isFile',
          },
        ],
      },
      server_tests: {
        files: [
          {
            expand: true,
            cwd: 'server/modules/',
            src: ['**/Test/**', '**/*Test.php'],
            dest: 'test-build/modules/php/',
            filter: 'isFile',
          },
          {
            expand: true,
            cwd: 'wclib/php/',
            src: ['**/Test/**', '**/*Test.php'],
            dest: 'test-build/modules/php/WcLib/',
            filter: 'isFile',
          },
        ],
      },
    },
    // shell: {
    //     deploy: {
    //         command: "lftp sftp://Oberstille@1.studio.boardgamearena.com -e \"mirror --reverse --parallel=10 --delete $PWD/build/ effortless/; exit\"",
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
          'build/effortless.css': [
            'client/**/*.css',
            'tmp/**/*.css',
            'assets/**/*.css',
          ],
        },
      },
    },
    sass: {
      target: {
        files: [
          {
            expand: true,
            cwd: 'client/',
            src: ['**/*.scss'],
            dest: 'tmp/',
            ext: '.css',
          },
        ],
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
        src: ['client/**/*.ts', 'wclib/js/**/*.ts'],
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
        command: [
          'mkdir -p tmp/phan',
          [
            'docker run -i --rm',
            '-v $PWD/test-build:/src/test/effortless:ro',
            '-v $PWD/build:/src/game/effortless:ro',
            '-v $PWD/phan.config.php:/config/phan.config.php:ro',
            '-v $PWD/tmp/phan:/output:rw',

            // // XXX: This is necessary only for test code; but adding it creates "redefined class" errors.
            //
            // '-v ${LOCALARENA_ROOT}/src/module:/src/localarena/module:ro',
            'wardcanyon/localarena-testenv:latest',
            'phan --config-file=/config/phan.config.php --progress-bar -o /output/analysis.txt',
          ].join(' '),
          'PHAN_EXIT_CODE=$?',
          'cat tmp/phan/analysis.txt',
          '$(exit $PHAN_EXIT_CODE)',
        ].join(' ; '),
      },
      test_server: {
        // This depends on having brought up LocalArena, by running something like this in that repository:
        //
        //   $ grunt && docker image prune -f && docker compose down && docker compose up --build
        //
        // The LOCALARENA_ROOT env var must also be set to the root path of that repository.
        //
        // Notice that we deliberately *don't* mount "wclib/bga-stubs" here; instead, we mount the LocalArena
        // implementations of those APIs.
        //
        // At some point we might want to create real interfaces for the BGA table and so forth.  At the moment, what we
        // have in LocalArena and in the WcLib stubs (which are based on VictoriaLa's) need to match.
        command: [
          'docker run -i --rm',

          '--network localarena_default',
          '-v ${LOCALARENA_ROOT}/db/password.txt:/run/secrets/db-password:ro',
          '-v ${LOCALARENA_ROOT}/src/module:/src/localarena/module:ro',
          '-v ${LOCALARENA_ROOT}/src/game/localarenanoop:/src/game/localarenanoop:ro',

          '-v $PWD/test-build:/src/test/effortless:ro',
          '-v $PWD/build:/src/game/effortless:ro',

          'wardcanyon/localarena-testenv:latest',
          'phpunit --configuration /src/test/effortless/modules/php/Test/phpunit.xml',
        ]
          .concat(phpunit_args)
          .join(' '),
      },
      generate_gameoptions: {
        // We use the LocalArena testenv here, but we really just need a PHP interpreter.
        //
        // XXX: That's not completely true; e.g. `totranslate()` is called from "gameoptions.inc.php".
        command: [
          'docker run -i --rm',

          '-v ${LOCALARENA_ROOT}/src/module:/src/localarena/module:ro',

          '-v $PWD/:/src/repo/effortless:ro',
          '-v $PWD/build:/src/game/effortless:rw',

          'wardcanyon/localarena-testenv:latest',
          'php /src/repo/effortless/scripts/GenerateBgaJson.php --metadata-type=gameoptions --input=/src/repo/effortless/server/gameoptions.inc.php --output=/src/game/effortless/gameoptions.json',
        ]
          .concat(phpunit_args)
          .join(' '),
      },
      generate_gamepreferences: {
        // We use the LocalArena testenv here, but we really just need a PHP interpreter.
        command: [
          'docker run -i --rm',

          '-v ${LOCALARENA_ROOT}/src/module:/src/localarena/module:ro',

          '-v $PWD/:/src/repo/effortless:ro',
          '-v $PWD/build:/src/game/effortless:rw',

          'wardcanyon/localarena-testenv:latest',
          'php /src/repo/effortless/scripts/GenerateBgaJson.php --metadata-type=gamepreferences --input=/src/repo/effortless/server/gameoptions.inc.php --output=/src/game/effortless/gamepreferences.json',
        ]
          .concat(phpunit_args)
          .join(' '),
      },
      ts: {
        command: ['npx tsc --project tmp/tsconfig.json'].join(' '),
      },
      clean: {
        command: ['rm -rf ./build ./test-build ./tmp'].join(' '),
      },
    },
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-shell');
  grunt.loadNpmTasks('grunt-jsonlint');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-ts');
  grunt.loadNpmTasks('grunt-prettier');
  grunt.loadNpmTasks('grunt-tslint');

  console.log(
    [
      'docker run -i --rm',

      '--network localarena_default',
      '-v ${LOCALARENA_ROOT}/db/password.txt:/run/secrets/db-password:ro',
      '-v ${LOCALARENA_ROOT}/src/module:/src/localarena/module:ro',
      '-v ${LOCALARENA_ROOT}/src/game/localarenanoop:/src/game/localarenanoop:ro',

      '-v $PWD/test-build:/src/test/effortless:ro',
      '-v $PWD/build:/src/game/effortless:ro',

      'wardcanyon/localarena-testenv:latest',
      'phpunit --configuration /src/test/effortless/modules/php/Test/phpunit.xml',
    ]
      .concat(phpunit_args)
      .join(' '),
  );

  // This is a hack related to the way that we try to extend a Dojo class (ebg.core.gamegui) with TypeScript.
  //
  // It uncomments everything between two marker comments; we use this to add an empty `GameGui` class into our JavaScript
  // output.
  grunt.registerTask(
    'copy_and_replace_ts_build',
    'Copy TS build output and replace special comments',
    function () {
      let lines = grunt.file.read('tmp/client/effortless.js').split('\n');

      let uncomment = false;
      for (let i = 0; i < lines.length; ++i) {
        const line = lines[i];
        // console.log(line);
        if (line.trim() === '/* @@WC_UNCOMMENT_BEGIN@@ */') {
          // console.log('** uncomment on');
          uncomment = true;
        } else if (line.trim() === '/* @@WC_UNCOMMENT_END@@ */') {
          // console.log('** uncomment off');
          uncomment = false;
        } else if (uncomment && line.startsWith('//')) {
          // console.log('** uncommenting');
          lines[i] = line.slice(2);
        }
      }

      grunt.file.write('build/effortless.js', lines.join('\n'));
    },
  );

  grunt.registerTask('phan', [
    'copy:server_sources',
    'copy:server_tests',
    'shell:phan',
  ]);

  grunt.registerTask('client', [
    'sass',
    'cssmin',
    'build-ts',
    'copy:client_ts_build',
    'copy_and_replace_ts_build',
  ]);

  grunt.registerTask('tsconfig', [
    'jsonlint:tsconfig', // Lint (but don't modify) the source tsconfig.
    'copy:tsconfig',
    'jsonlint:output_tsconfig', // This rewrites the JSON5 input as plain ol' JSON.
  ]);

  // These steps are the actual TypeScript build.
  grunt.registerTask('build-ts', [
    'copy:client_ts_sources',
    'prettier:client_ts',
    'tslint',
    'tsconfig',

    // XXX: 'ts',
    'shell:ts',
  ]);

  grunt.registerTask('lint:server', ['jsonlint:bga_metadata', 'phan']);

  grunt.registerTask('server', [
    'lint:server',
    'copy:server_sources',
    // 'shell:generate_gameinfos',
    'shell:generate_gameoptions',
  ]);

  grunt.registerTask('fix', ['prettier', 'shell:prettier_server_php']);

  grunt.registerTask('build', ['server', 'client', 'copy:assets']);

  grunt.registerTask('default', ['fix', 'build']);

  grunt.registerTask('test:server', [
    'server',
    'copy:server_tests',
    'shell:test_server',
  ]);

  // XXX: It'd be nice to have a "run test:server, but skip linting" option, rather than needing to do something like
  // `grunt copy:server_{sources,tests} shell:generate_gameoptions shell:test_server`.

  grunt.registerTask('test', ['test:server']);

  grunt.registerTask('clean', ['shell:clean']);
};
