### 给Pocket提取知乎专栏

#### 介绍

　　由于Pocket抓取的知乎专栏文章无法在一些客户端上同步（比如KOBO），所以用这个php来辅助Pocket抓取。

　　原本这个源码只能在 Apache 环境下运行，这是由于 Nginx 环境不支持`getallheaders()`函数所致，所以在本php文件中加入了该函数原型，让其在 Nginx 下亦能使用。

#### 使用方法

　　将 zhihu.php 上传到虚拟主机，然后在Pocket中添加`http://你的主机地址/zhihu.php?page=专栏ID`即可（或直接网页访问该地址后再用Pocket插件加入），专栏ID即`https://zhuanlan.zhihu.com/p/12345678`最后的那串数字。

#### 参考

源码原作者：https://zohead.com/archives/php-zhihu-pocket/

解决Nginx下函数失效：https://www.bicky.me/blog/archive/php-getallheaders-didnt-work-in-nginx/