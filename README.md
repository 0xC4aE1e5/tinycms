# tinycms
## Notes:
- The default password is `root`. Do not enter a username.
- Installation on InfinityFree works, but here is a [guide](https://forum.infinityfree.net/t/tinycms-infinityfree/54475) (title is mispelled, I know. It's forced.)
- Updating is the same as install, but don't overwrite `password.php`, `index.html` (and if themed, `style.css`).
- Themes are simple, just change `/style.css` and put whatever. When editing however, it looks unstyled. But it is styled.
## After install
1. Change the password. You put the password in the file `password.php`. Note that it's unencrypted, but they can't see it. (all they get is a notice to stop hacking). Make sure the file has no line endings. Also, put it after the '?>'. No newlines, no spaces. (use `tr -d '\r\n'` to get rid of the newlines; the password can have spaces, though.)

2. Open the admin page. To do that, go to `/admin/`. The extra `/` is important, because the site doesn't work properly.

3. Edit the home page. Just press `edit`. You will get a WYSIWYG editor.

4. Publish! Just press `publish & return`!

5. Your site is live. Just delete everything after `/admin/` to preview.
