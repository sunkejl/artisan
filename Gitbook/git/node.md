####Git global setup
git config --global user.name "sk"
git config --global user.email "xxx@xxx.com"
####Create a new repository
git clone git@xxxx.git
touch README.md
git add README.md
git commit -m "add README"
git push -u origin master
####Existing folder or Git repository
cd /
git init
git remote add origin git@xxx.git
git push -u origin master


