const path = require('path');

module.exports = {
  parser: 'babel-eslint',
  plugins: ['import'],
  parserOptions: {
    ecmaVersion: 6,
    sourceType: 'module',
    ecmaFeatures: {
      jsx: true,
    },
  },
  rules: {
    // Note regarding rule severity, the available values are:
    //    'off' or 0 - turn the rule off
    //    'warn' or 1 - turn the rule on as a warning (doesn't effect exit code)
    //    'error' or 2 - turn the rule on as an error (exit code is 1 when triggered)
    //-------------------------------------------------------------------------------------------
    'import/no-extraneous-dependencies': 0,
    'import/no-named-as-default': 0,
    'no-console': 1,
    'jsx-a11y/anchor-is-valid': [
      'error',
      {
        components: ['Link'],
        specialLink: ['to'],
        aspects: ['noHref', 'invalidHref', 'preferButton'],
      },
    ],
    'react/jsx-filename-extension': [
      1,
      {
        extensions: ['.js', '.jsx'],
      },
    ],
  },
  settings: {
    'import/resolver': {
      node: {
        paths: [path.resolve(__dirname, 'src')],
      },
    },
  },
};
