// This file controls how Tailwind processes your CSS. For details, see
// https://tailwindcss.com/docs/configuration

module.exports = 
{
  
  //
  // WARNING: By default, CodeKit automatically populates the `content` array with all entries from [Project Settings > PurgeCSS]
  // in CodeKit's UI. If you add ANY entries to the `content` array here, CodeKit will not auto-populate the array; it becomes your
  // responsibility to include every type of file in your project that uses CSS rules. It is preferable to edit the PurgeCSS content 
  // list in CodeKit's UI.
  // 
  // WARNING: DO NOT delete `content` or comment it out. If you do, CodeKit will treat this as a Tailwind 2.x project instead of 3.x. 
  //
  content: [],
  darkMode: 'class',


  //
  // All other TailwindCSS options are 100% under your control. Edit this config file as shown in the Tailwind Docs
  // to enable the settings or customizations you need.
  // 
  theme: {
    extend: {
      colors: {
              'darkbg': '#040F1D',
              'darktext': '#DBDBDB',
              'aurora_grey' : '#CBC6B9'
            },
            aspectRatio: {
                'landscape': '672/378',
                'portrait': '672/798'
            },

            fontSize: {
                'tiny': '0.56rem'
            }

    }
  },

  variants: {},

  //
  // If you want to run any Tailwind plugins (such as 'tailwindcss-typography'), simply install those into the Project via the
  // Packages area in CodeKit, then pass their names (and, optionally, any configuration values) here. 
  // Full file paths are not necessary; CodeKit will find them.
  //
  plugins: []
}