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
