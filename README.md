# IFA 2 Custom Post Types 

This repo is just a storage area for changes made live on the IFA staging server.

## Problems & Solutions

#### Issues integrating CoSchedule and WP Structured Data Schema into the the Custom Editors

**Coschedule solution**: 
You just need to enable it in the settings.

See https://help.coschedule.com/hc/en-us/articles/215858037-Using-Custom-Post-TypesThe CoSchedule settigns.

Note that CoSchedule can only recognize post types that are listed in the wp_post DB table along with the other code post types. If your post type is there, it will show up in the CoSched API. If not, then you need to find a way to add it to that table. 

However, since their API will get confused when installed in the staging env, you'll need to test this on the live site once each post type is deployed.

**WP Structured Data Solution**:
Waiting to hear back from their support.

#### Issues with Social Warefare in the Editor

**This issue appears to be isolated to Chrome**
TypeError: Cannot read property ‘social-warfare/social-warfare’ of undefined
   at zn (https://staging-iotforall.kinsta.cloud/wp-includes/js/dist/editor.min.js?ver=9.0.11:55:45280)
   at https://staging-iotforall.kinsta.cloud/wp-includes/js/dist/editor.min.js?ver=9.0.11:55:46071
   at Array.map (<anonymous>)
   at https://staging-iotforall.kinsta.cloud/wp-includes/js/dist/editor.min.js?ver=9.0.11:55:45906
   at u (https://staging-iotforall.kinsta.cloud/wp-includes/js/dist/editor.min.js?ver=9.0.11:12:3427)
   at https://staging-iotforall.kinsta.cloud/wp-includes/js/dist/data.min.js?ver=4.2.1:1:6379
   at https://staging-iotforall.kinsta.cloud/wp-includes/js/dist/editor.min.js?ver=9.0.11:55:109194
   at n (https://staging-iotforall.kinsta.cloud/wp-includes/js/dist/data.min.js?ver=4.2.1:1:13036)
   at new r (https://staging-iotforall.kinsta.cloud/wp-includes/js/dist/data.min.js?ver=4.2.1:1:13298)
   at zf (https://staging-iotforall.kinsta.cloud/wp-includes/js/dist/vendor/react-dom.min.js?ver=16.6.3:69:258)
  
#### Other
**Issues with Weird, Ghostly Post Filter Block (span 12s) Showing Up On Posts.**
**The styles in style.css are global! So the old display: none that you had done was hiding, for example, categories from all posts! Double check all the mods you're making don't have side effects with other posts. A better solution may be to load the non-inline styles in a style tag in the template, so that it only loads when the template loads. Might be slower but safer not to put the css hacks in the global style sheet.**
