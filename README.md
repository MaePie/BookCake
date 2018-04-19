# BookCake

## Git Flow

When working on a new feature :

`git checkout master` (later develop)

`git pull` (`git pull --rebase`)

`git checkout -b "feature/my-feature"` : create new branch from master

Change/add files.

`git add <my-files>` or `git add .` (for all files)

`git commit -m "modification done"`

`git push --set-upstream origin feature/my-feature`

And then create a pull request from Github

And then push it to the limit

## Assets Gestion

 - Install [node.js](https://nodejs.org/en/)
 - Update npm : `npm install -g npm`
 - Install gulp-cli globally : `npm install -g gulp-cli`
 - Go to project folder : `cd /path/to/cakephp/`
 - Install node_modules : `npm install`
 - Run gulp : `gulp`

### Add a node_modules

 - Download a new module : `npm install my_module`
 - Add module to `vendor.js`
 - Add Css from `node_modules/my_module/my_module.min.css` to the needing style function in `gulpfile.bable.js`

 If you need to run a specific function
 - Create a new module `my_module_swag.js` with your running
 - Add your module in `index.js`
