truncate table articles;
insert into articles (id,title,content) VALUES (1,'101','# 101考试chrome插件(e.101.com和elearning.101.com页面下)在 开始考试或者重新考试页面![image](https://github.com/frankerzeng/e.101.com/blob/master/begin.png)点击插件中的开始考试按钮，等待答案填充完毕即可交卷。需手动提交，防止过快答题导致被查水表');

truncate table navigation;
insert into navigation (title,link,css) VALUES ('首页','index','font-weight:bold;font-size: larger;margin-left:40px');
insert into navigation (title,link,css) VALUES ('文章','articles','');
insert into navigation (title,link,css) VALUES ('Git','http://github.com/frankerzeng','');
insert into navigation (title,link,css) VALUES ('面点','fsc','font-weight:bold;font-size:larger;margin-left:40px');