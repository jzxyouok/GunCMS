# GunCMS
PHP 零基础一天写成的PHP枪支管理系统~

> 
mysql 搭建
> 
bootstrap 前端
> 
jpages 分页
>
然后其它的就是普通的增删改查啦~




项目准备
====
1、添加数据库：
> 
    mysql > create database mydatabase;
    mysql > use mydatabase;
    mysql > source C:\wamp\www\GunCMS\db.sql

2、设置php.ini不报warning
> 
    ; Examples:
    ;
    ;   - Show all errors, notices
    ;
    ;error_reporting = E_ALL & ~E_NOTICE
    ;
    ;   - Show only errors
    ;
    error_reporting = E_COMPILE_ERROR|E_ERROR|E_CORE_ERROR
    ;
    ;   - Show all errors except for notices and coding standards warnings
    ;
    ; error_reporting  =  E_ALL & ~E_NOTICE & ~E_STRICT

