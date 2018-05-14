git checkout master 
git pull
git checkout -b fea_ERP2656_o2oOrder_mas  //本地创建新分支
git status 
git diff
git add .
git commit -m "增加拆单逻辑"
git push origin fea_ERP2656_o2oOrder_mas  //推给远程 创建新远程分支
git branch --set-upstream-to=origin/fea_ERP2656_o2oOrder_mas   //绑定本地和远程分支



