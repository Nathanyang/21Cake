# Nathan-21Cake
nathan copy a 21Cake Web
=======================================

Create Bundle
---------------------------------------
    1. php ./app/console generate:bundle
        enter Bundle namespace: NathanDessert/CakeBundle
        Configuration format (yml, xml, php, or annotation): annotation
前端
----------------------------------
    2. 使用Twig整合HTML5Boilerplate
    3. 资源install
        php ./app/console assets:install web 硬拷贝
        php ./app/console assets:install web [--symlink] [--relative] 软连接形式
        页面上使用{{ asset("bundles/nathandessertcake") }} /(css/js/font/images)files

        {% javascripts '@NathanDessertCakeBundle/Resources/public/js/*' %}
            <script type="text/javascript" src="{{ asset_url }}"></script>
        {% endjavascripts %}
        1) need to modify app/config/config.yml
        2) then go to assetic:
        3) under assetic: go to bundles: []
        4) and in bundles: [] //type your bundle name
        for instance if your bundle is Acme\DemoBundle, then do the following
        assetic:
            bundles: [ AcmeDemoBundle ]
        or you just need to comment (with #) the line bundles: []
    4. 删掉一个bundle需同时清空app/cache 文件夹，删除app/AppKernel.php 文件中的注册信息，删除app/config/routing.yml中的路由信息
    5. coffee script
        node 安装好后需要设置系统变量，这一步非常关键。进入我的电脑→属性→高级→环境变量。在系统变量下新建“NODE_PATH”，输入“D:\Program Files\nodejs\node_global\node_modules”。
        npm i -g coffee-script/（npm install -g coffee-script）
        注意：需要将node_global添加到windows环境变量
        coffee -v ok
        Symfony 支持的 filters: 查看文件vendor/symfony/assetic-bundle/Resources/config/filters

        npm config get cache
        D:\Program Files\nodejs\node_cache
        npm config get globalconfig 全局配置文件
        old D:\Program Files\node_modules\node_global\etc\npmrcclear
        npm config get globalignorefile
        D:\Program Files\nodejs\node_global\etc\npmignore
        npm config get prefix
        D:\Program Files\nodejs\node_global

        npm config set cache D:\nodeJsProgramFiles\nodejs\node_cache
        npm config set globalconfig D:\nodeJsProgramFiles\node_modules\node_global\etc\npmrcclear
        npm config set globalignorefile  D:\nodeJsProgramFiles\nodejs\node_global\etc\npmignore
        npm config set prefix  D:\nodeJsProgramFiles\nodejs\node_global 主要是这句配置起作用了


        配置：
        .twig 文件中
        {% javascripts '@NathanCakeBundle/Resources/public/js/index/*.coffee'
            filter="coffee" %}
            <script type="text/javascript" src="{{ asset_url }}"></script>
        {% endjavascripts %}
        配置文件(config.yml)：
            assetic:
                filters:
                    coffee:
                        bin: /usr/local/bin/coffee
                        node: /usr/local/bin/node
    6. uglifyjs2 Js 压缩工具
        .twig 文件中
        {% javascripts '@NathanCakeBundle/Resources/public/js/index/*.coffee'
            filter="uglifyjs2" %}
            <script type="text/javascript" src="{{ asset_url }}"></script>
        {% endjavascripts %}
        配置文件(config.yml)：
            assetic:
                filters:
                    uglifyjs2:
                        bin: /usr/local/bin/uglifyjs
                        node: /usr/local/bin/node

    这里可以把node配置在外层
        node: /usr/local/bin/node
        filters:
            coffee:
                bin: /usr/local/bin/coffee
            uglifyjs2:
                bin: /usr/local/bin/uglifyjs

    设置压缩只在开发环境中起效：.twig文件中filter前添加一个问号
        {% javascripts '@NathanCakeBundle/Resources/public/js/index/*.coffee'
            filter="?uglifyjs2" %}
            <script type="text/javascript" src="{{ asset_url }}"></script>
        {% endjavascripts %}


数据库
--------------------------------------
    7. Doctrine2
        //获取一条数据
        $user = $em->getRepository('User')->findOneBy(array('id'=>1));

        //proxy class
        foreach($user->getAddressBooks as $addressBook) {
            echo $addressBook->getName();
        }

        //更新数据
        $user->setName("Nathan");

        $em->persist($user);
        $em->flush();

        //DQL
        $query = $em->createQuery(
            'select u from DataBundle:User p where u.block=0'
        )->setParameter('name', 'nathan');

        $query2 = $em->getRepository('User')->createQueryBuilder('U')
            ->where('u.name = :name')
            ->serParameter('name', 'nathan')
            ->getQuery();

    8. Entity 配置
        1)use Doctrine\ORM\Mapping as ORM;
        2)
            /**
             * Class User
             * @ORM\Entity()
             * @ORM\Table(name="user")
             */
            class User {}
            如果要生成repository 需要改成 * @ORM\Entity(repositoryClass="UserRepository")
        3)
            /**
               * @ORM\Id
               * @ORM\Column(type="integer")
               * @ORM\GeneratedValue(strategy="AUTO")
               */
              protected $id;

    9. 生成set,get,repository
        php ./app/console generate:doctrine:entities NathanCakeBundle
        自动生成get-set-repository
        当我们修改了entity的字段时，注意执行以上命令后，之前的set-get是不会删除的需要手动删除

    10.创建数据库
        1）确认 \app\config\parameters.yml中已经配置了数据库，并且不存在同名数据库
        php .\app\console doctrine:database:create

    11.生成数据库
        php .\app\console doctrine:schema:update --force * --force 强制执行
        这条命令可以创建数据库表，同样也可以根据entity修改数据库表结构
        php .\app\console doctrine:schema:update --dump-sql 可以比较entity和数据库表的差异，生成sql语句

    12.Entity 之关系定义
       在两个entity中都需先创建两个另一张表的（实例）。
       创建profile和user的1对1关系
       1)在user中增加
            private $profile;
         在profile中增加
            private $user;
       2)在entity中引入两个annotation
            use Doctrine\ORM\Mapping\OneToOne;
            use Doctrine\ORM\Mapping\JoinColumn;
       3)在profile中添加annotation描述
            /**
             * @OneToOne(targetEntity="User", inversedBy="profile") //设置 profile 的一对一关系的目标对象为User, 和在user Entity中profile对应的变量也就是private $profile;
             * @JoinColumn(name="user_id", referencedColumnName="id") //在user_id上设置外键, 映射到user表的id字段上
             */
       4)在user中增加annotation描述
            /**
             * @OneToOne(targetEntity="Profile", mappedBy="user")
             */atus


    13. Form
         php app/console doctrine:generate:form yourbundle:yourentity
         然后自动生成form，名字叫yourentityType，当然如果你想要很多form对应一个entity，直接在form里copy paste你之前的form,该名字就可以了

         Controller 中组织form
         1）
                $type       = new Genre();
                $form       = $this->createForm( new GenreType(), $type  );
                return array(
                    'form' => $form->createView(),
                );

         2）
                $crowd = new Crowd();
                $form = $this->createFormBuilder($crowd)
                       ->add('code' , 'text' )
                       ->add('name' , 'text' )
                       ->add('save' , 'submit' , array('label' => 'Add New Crowd' ))
                       ->getForm();

         submit Form
         $request = $this->get('request');
                 if ($request->getMethod() == 'POST') {
                     $form->bind( $request ); ---->当前步骤会把表单数据绑定到entity对象
                     Debug:dump($crowd);----->发现已经存在数据
                     if ($form->isValid()) {
                         $em->persist($crowd);
                         $em->flush();
                         return $this->redirect($this->generateUrl('crowd-list'));
                     }
                 }

         FORM Valid
         # AppBundle/Resources/config/validation.yml
         AppBundle/Entity/Type:
           properties:
             code:
               - NotBlank: ~
             name:
               - NotBlank: ~

         内建表单项类型
         Symfony2标配了大量的表单项类型，它涵盖了所有的常见表单项以及你所遇到的数据类型：
         文本表单项
         text
         textarea
         email
         integer
         money
         number
         password
         percent
         search
         url
         选择表单项
         choice
         entity
         country
         language
         locale
         timezone
         日期和时间表单项
         date
         datetime
         time
         birthday
         其它表单项
         checkbox
         file
         radio
         表单项组
         collection
         repeated
         隐藏表单项
         hidden
         csrf
         基础表单项
         field
         form




    14.var_dump()
        1)
        use Doctrine\Common\Util\Debug;
        Debug::dump($form);
        or
        Debug:dump($form);
        2)
        use Symfony\Component\HttpKernel\Debug;
        Debug:dump($form);

    15.Get QueryString
        $request->query->get("$name")
        Get Post Data











