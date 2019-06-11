# ifa2-post-types

This repo is just a storage area for changes made live on the IFA staging server.

## Problems & Solutions

#### Issues integrating CoSchedule and WP Structured Data Schema into the the Custom Editors

**Coschedule solution**: 
You just need to enable it in the settings.

See https://help.coschedule.com/hc/en-us/articles/215858037-Using-Custom-Post-TypesThe CoSchedule settigns.

Note that CoSchedule can only recognize post types that are listed in the wp_post DB table along with the other code post types. If your post type is there, it will show up in the CoSched API. If not, then you need to find a way to add it to that table. 
