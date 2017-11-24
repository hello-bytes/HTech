# HelloTech 开源博客

上帝说，要有光，于是便有了光，Aaron说，想写博客了，于是就有了HTech。

## 1 演示地址

我的个人博客[Hello-Tech](http://www.hellotech.mobi)即是使用此网站代码部署。

效果图：![Hello-Tech](https://github.com/Hello-Tech/HelloTech/raw/dev/doc/images/hellotech-blog-screenshot.png)

# 2 部署

整个部署过程极为简单，仅需要下载代码，运行初始化环境，再配置一下Apache或ngnix等Web支持php的web容器即可。

### 2.1 下载代码
```
git clone https://github.com/Hello-Tech/HTech.git
```

git库已经包括了所有的代码，无需更新或下载其它模块

### 2.2 运行脚本`deploy.sh`以初始化环境

如果不想了解细节，只需要运行如下命令即可完成网站的初始化
```
bash deploy.sh init
```

`deploy.sh`主要完成以下工作：

 - 生成storage目录及其子目录
 - 生成bootstrap的cache目录
 - 准备sqlite3的数据库文件，HTech支持mysql,不过默认配置是sqlite
 - 生成`.env`文件,`.env`文件包括的调试开关，数据库类型与连接信息
 
.env文件为系统使用的全局配置文件，配置配置如下所示：
```
APP_ENV=local
APP_DEBUG=true
APP_KEY=aaronhtechloghtechnshtechaha23ew

DB_CONNECTION=sqlite
DB_DATABASE={网站所在目录}/storage/htech.db
```

> 上面的配置文件中，{网站所在目录}为您网站的绝对路径。即运行`bash deploy.sh init` 以后，一切的一切都准备好了。


