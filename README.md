# IFA 2 Custom Post Types 

This repo is just a storage area for changes made live on the IFA staging server.

[Submit an issue](https://github.com/mgwedd/ifa2-post-types/issues) if you find any bugs or problems. 

## Deployment
1. Make a predeploy failsafe image of the live site
2. Open up an SSH tunnel into the live server with Cyberduck and get into the `wp-content`directory
3. Inject the `ifa-custom-post-types.php` file (the new custom post types wrapper plugin) into the `mu-plugins` directory, which will register all of the custom post types into WP. 
4. **TODO** Figure out how to rebuild the permalink structure to include the new post types, without causing SEO havoc. Then rebuild the permalinks at this stage of the deployment. 
5. Inject `single-podcast.php` into the `child-theme` subdirectory of the `theme`. 
6. Clear all of the caches. 
7. Monitor the site for a moment to check stability. Check the Kinsta error logs. If it's stable, proceed; if not, revert to the failsafe image and do a post op.
8. **TODO** Plan this out, but essentially transfer the content of the old podcast posts into the new post type and republish (?)
9. **TODO** Change the Filter on the Podcast page ([on the theme UI](https://imgur.com/a/kjuG7Wg)) to filter for the new podcast post type rather than the old category hack we were using. 
10. Go into the WP SEO Structured Data plugin settings and enable all the new post types (see closed issues in this repo for instructions).
11. Follow [these instructions](https://help.coschedule.com/hc/en-us/articles/215858037-Using-Custom-Post-TypesThe) to enable CoSchedule for this new post type. If it doesn't appear on CoSchedule's UI, then we know that the post type isn't being populated in the `wp-posts` table in the database, so go about figuring that out. Talk to James about this if needed. 
10. Monitor and test extensively. 
