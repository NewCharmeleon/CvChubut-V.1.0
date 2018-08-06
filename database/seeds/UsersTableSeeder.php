<?php

use Illuminate\Database\Seeder;

use Faker\Factory as Faker;

use App\User;
use App\Role;
use App\Persona;
use App\Carrera;

class UsersTableSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //Vaciamos las Tablas para evitar errores
    
    Role::truncate();
    Carrera::truncate();
    User::truncate();
    Persona::truncate();
    DB::table('role_user')->truncate();
        
    //Creamos instancia de Faker designando el lenguaje a utilizar
    $faker = Faker::create('es_ES');
    
    /*
    //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder
    for ($i=0; $i<9; $i++)
    {
      //llamamos al Metodo Create del Modelo para crear una nueva fillable
      User::create(
      [
        'username'=>$faker->unique($reset = true)->userName(),
        'email'=>$faker->unique($reset = true)->safeEmail(),
        'password'=>Hash::make(123456)
      ]);
    }*/

    //Datos basicos para rellenar los roles basicos
    $roles = [
      [
        'name' => "Administrador",
        'display_name' => "Administrador",
        'description' => "Persona con permisos para controlar el Sistema"
      ], 
      [
        'name' => "Secretaria",
        'display_name' => "Secretaria",
        'description' => "Persona con permisos para gestionar los Estudiantes y/o Personas"
      ],
      [
        'name' => "Estudiante",
        'display_name' => "Estudiante UDC",
        'description' => "persona con permisos para ver y editar su perfil junto a sus Actividades"
      ],
    ];
    //var_dump($roles);

    //Creacion de los Roles basicos para pruebas
    foreach( $roles as $rol ) {
      Role::create($rol);
    }

    //Rol Administrador
    //llamamos al Metodo Create del Modelo para crear un nuevo fillable
    $user = User::create([
      'username' => 'administrador_udc',
      'email' => 'administrador@udc.edu.ar',
      'password' => '12456'
    ]);
    //var_dump($user);
    
    //Metodo a revisar para crear Personas Administradores  
    //llamamos al Metodo Create del Modelo mediante nuevo Fillable
    $persona = Persona::create([
      'nombre_apellido' => $faker->firstName." ".$faker->lastName,
      'dni' => '1357911',
      'nacionalidad' => 'Argentina',
      'fecha_nac' => $faker->date('d-m-Y'),
      'telefono' => "",
      'user_id' => $user->id,
      'carrera_id' => null
      
    ]);
    //var_dump($persona);
    
    //Se llama al Metodo para hashear el password
    $user->hashPassword();
    //Se asigna el Rol Administrador al Usuario
    $user->attachRole(Role::where('name', 'LIKE', 'Administrador')->get()->first()->id);

    
    //Rol Secretaria
    //llamamos al Metodo Create del Modelo para crear una Secretaria
    $user = User::create([
      'username' => 'secretaria_udc',
      'email' => 'secretaria@udc.edu.ar',
      'password' => '123456',
    ]);
    
    //Metodo a revisar para crear Personas Secretaria  
    //llamamos al Metodo Create del Modelo mediante nuevo Fillable
    $persona = Persona::create([
      'nombre_apellido' => $faker->firstName." ".$faker->lastName,
      'dni' => '1357911',
      'nacionalidad' => 'Argentina',
      'fecha_nac' => $faker->date('d-m-Y'),
      'telefono' => "",
      'user_id' => $user->id,
      'carrera_id' => null
    ]);
    

    //Se llama al Metodo para hashear el password
    $user->hashPassword();
    //Se asigna el Rol Secretaria al Usuario
    $user->attachRole(Role::where('name', 'LIKE', 'Secretaria')->get()->first()->id);

    //Rol Alumno por defecto
    //llamamos al Metodo Create del Modelo para crear un Alumno por defecto
    $user = User::create([
      'username' => 'alumno',
      'email' => 'alumno@udc.edu.ar',
      'password' => '123456',
    ]);
      
    //Metodo a revisar para crear Personas Alumnos  
    //llamamos al Metodo Create del Modelo mediante nuevo Fillable
    $persona = Persona::create([
      'nombre_apellido' => $faker->firstName." ".$faker->lastName,
      'dni' => '1357911',
      'nacionalidad' => 'Argentina',
      'fecha_nac' => $faker->date('d-m-Y'),
      'telefono' => "",
      'user_id' => $user->id,
      'carrera_id' => null
      
    ]);
    

    //Se llama al Metodo para hashear el password
    $user->hashPassword();
    //Se asigna el Rol Alumno al Usuario
    $user->attachRole(Role::where('name', 'LIKE', 'Estudiante')->get()->first()->id);


    //carga de Alumnos de prueba mediante Arreglo

    $alumnos = [
      [ 
        //alumno
        "usuario" => [//usuario
          "email"     => "baaballay@udc.edu.ar",
          "password"  => "123456",
          "username"  => "alumno"
        ], //persona
        "persona" => [
          "nombre_apellido" => "ABALLAY Belen Ayelen",
          "dni" => "38804297"
        ]   
      ],

      [ 
        //alumno
        "usuario" => [//usuario
          "email"    => "drabarzua@udc.edu.ar",
          "password" => "123456",
          "username" => "alumno"
        ],
        //persona
        "persona" => [
          "nombre_apellido" => "ABARZUA Delia Rocio",
          "dni" => "39440366"
        ]
      ],
      [ 
          //alumno
        "usuario" => [//usuario
          "email" => "bsabraham@udc.edu.ar",
          "password" => "123456",
          "username" => "alumno"
        ], //persona
        "persona" => [
          "nombre_apellido" => "ABRAHAM Bruno Stefano",
          "dni" => "41525735"
        ]
      ]

    ];

    foreach(  $alumnos as $alumno ){

      //temporal de datos de usuario para crear uno nuevo
      $data_user = $alumno['usuario'];
      
      //temporal de datos de persona 
      $data_persona = $alumno[ 'persona' ] ; 
      
      //se crea un usuario
      $user = User::create( $data_user  );

      //se actualiza temporal de persona con el usuario asociado 
      $data_persona['user_id'] = $user->id;

      //creamos persona
      $persona =  Persona::create($data_persona );

      //se hace hash de la contraseña con el dni de persona
      $user->hashPassword(); 
      //se genera el username correspondiente
      $user->updateUsername(); 
      //se asigna el rol estudiante
      $user->attachRole(Role::where('name', 'LIKE', 'Estudiante')->get()->first()->id);
      


    }
    /*
      ABRIGO Estefania Tamara 35887126 etabrigo @udc . edu . ar
      ACEJO Julieta Mariela 30955258 jmacejo @udc . edu . ar
      ACEVEDO Lucas Dario 32568676 ldacevedo @udc . edu . ar
      ACIAR Jose Alberto 38711258 jaaciar @udc . edu . ar
      ACOSTA Nicolás Gabriel 33946558 ngacosta @udc . edu . ar
      ACOSTA Rocio Solange 35887469 rsacosta @udc . edu . ar
      ACOSTA LEAL Florencia Noemí 34664165 fnacostaleal @udc . edu . ar
      ACOSTA QUINTEROS Maria Elena 94249175 meacostaquinteros @udc . edu . ar
      ACUÑA Guillermo Gabriel 24005818 ggacuna @udc . edu . ar
      ACUÑA Sofia Valeria 39452309 svacuna @udc . edu . ar
      ACUÑA VALDEZ Carlos Jonathan 94086997 cjacunavaldez @udc . edu . ar
      AGUERRE Agustin Ezequiel 40872010 aeaguerre @udc . edu . ar
      AGUERRE Gisel 40208935 gaguerre @udc . edu . ar
      AGUIAR CARULLI Maria Jazmin 39388522 mjaguiarcarulli @udc . edu . ar
      AGUILA Martín Alejandro 32489543 maaguila @udc . edu . ar
      AGUILAR Carla Daniela 29260208 cdaguilar @udc . edu . ar
      AGUIRRE Fabiana Yamina 32632420 fyaguirre @udc . edu . ar
      AGUIRRE Karen Belén 39440712 kbaguirre @udc . edu . ar
      AGUIRRE Micaela Araceli 38800714 maaguirre @udc . edu . ar
      AGUIRRE Sofia Antu 42133266 saaguirre @udc . edu . ar
      AGUIRRE Ángel Cristian 31852520 acaguirre @udc . edu . ar
      AGÜERO Néstor René 27363413 nraguero @udc . edu . ar
      AGÜERO Pablo Javier 27053237 pjaguero @udc . edu . ar
      AGÜERO Sergio Emanuel 38805357 seaguero @udc . edu . ar
      AGÜERO Verónica Haydee 29581224 vhaguero @udc . edu . ar
      ALARCON Liliana Belén 38800158 lbalarcon @udc . edu . ar
      ALBERTO Yuliana Belen 41017023 ybalberto @udc . edu . ar
      ALBORNOZ Jenifer Pamela 42315535 jpalbornoz @udc . edu . ar
      ALBORNOZ ARRUA Julieta 39517802 jalbornozarrua @udc . edu . ar
      ALCOCER PEREZ Liliana 94103765 lalcocerperez @udc . edu . ar
      ALCOCER VARGAS Yanina Maribel 35888861 ymalcocervargas @udc . edu . ar
      ALDERETE Natalia del Valle 39145681 ndvalderete @udc . edu . ar
      ALEGRIA Rocio Yanett 39897534 ryalegria @udc . edu . ar
      ALEUY Nicolás Agustin 38798696 naaleuy @udc . edu . ar
      ALMENDRA Barbara 37347741 baalmendra @udc . edu . ar
      ALMENDRA Gabriel Alejandro 40800225 gaalmendra @udc . edu . ar
      ALONQUEO Daiana Ailen 37148279 daalonqueo @udc . edu . ar
      ALTAMIRA Aixa Malen 38793489 amaltamira @udc . edu . ar
      ALTAMIRANO Fernando Miguel 40207503 fmaltamirano @udc . edu . ar
      ALTAMIRANO Silvia Liliana 20236458 slaltamirano @udc . edu . ar
      ALVARADO Rodrigo Gabriel 37764684 rgalvarado @udc . edu . ar
      ALVAREZ Andrea Anahi 35357090 aaalvarez @udc . edu . ar
      ALVAREZ Jairo Ivan 38805812 jialvarez @udc . edu . ar
      ALVAREZ Maria Cristina 41040992 mcalvarez @udc . edu . ar
      ALVAREZ Nadia Sabrina 34194043 nsalvarez @udc . edu . ar
      ALVAREZ Valentina 39441228 valvarez @udc . edu . ar
      ALVAREZ Vanesa Soledad 35456015 vsalvarez @udc . edu . ar
      ALZOGARAY Gisel Fabiola Belén 35604057 gfbalzogaray @udc . edu . ar
      AMADO Yamila Macarena 38801081 ymamado @udc . edu . ar
      AMAT WILLIAMS Axel German 38801561 agamatwilliams @udc . edu . ar
      AMUINAHUEL María Luisa 34275852 mlamuinahuel @udc . edu . ar
      ANABALON Pablo Daniel 35886974 pdanabalon @udc . edu . ar
      ANAGUA GOMEZ Matilde Isabel 94566333 mianaguagomez @udc . edu . ar
      ANCAJIMA BRAVO Ronald Henry 94721250 rhancajimabravo @udc . edu . ar
      ANCHORENA Angelica Yasmin 32568865 ayanchorena @udc . edu . ar
      ANDERSON Kevin William 40210082 kwanderson @udc . edu . ar
      ANDRADA Jorge Ernesto 30596630 jeandrada @udc . edu . ar
      ANDRADE Betiana Elizabeth 29957154 beandrade @udc . edu . ar
      ANDRADE Celia Noemi 34726921 cnandrade @udc . edu . ar
      ANDRADE Cristian Yamilo 36914479 cyandrade @udc . edu . ar
      ANDURELL Naara Mailen 40492918 nmandurell @udc . edu . ar
      ANGEL Roxana del Carmen 25124196 rdcangel @udc . edu . ar
      ANGEL Yamil Yasu 36212837 yyangel @udc . edu . ar
      ANTELAF MARIN Samira Malen 40208585 smantelaf @udc . edu . ar
      ANTIECO Bruno Rodrigo 38535855 brantieco @udc . edu . ar
      ANTIECO Cristian Emanuel 40208169 ceantieco @udc . edu . ar
      ANTIGNIR Alicia Marisa 32189578 amantignir @udc . edu . ar
      ANTILLANCA Florencia Agustina 39442741 faantillanca @udc . edu . ar
      ANTON Lucia Abigail 40208665 laanton @udc . edu . ar
      ANTONIO Walter Fernando 37676953 wfantonio @udc . edu . ar
      ANTRICHIPAY Sandra Liliana 32142590 slantrichipay @udc . edu . ar
      ANTUAL Kevin Brian 38804355 kbantual @udc . edu . ar
      ANTUBIL Carla Pamela 38805967 cpantubil @udc . edu . ar
      ANTUBIL Lucía Belén 41083002 lbantubil @udc . edu . ar
      AP IWAN Florencia Micaela 38300038 fmapiwan @udc . edu . ar
      APARICIO Luis Ernesto 30609312 leaparicio @udc . edu . ar
      APERTILE Claudio Alberto 41089856 caapertile @udc . edu . ar
      ARANCIBIA Adriana Mariana 33954324 amarancibia @udc . edu . ar
      ARANCIBIA Katherine Celina 40208805 kcarancibia @udc . edu . ar
      ARANDA Carla Susana 37666479 csaranda @udc . edu . ar
      ARANDIA ORTUÑO Jonathan Franco 41118936 jfarandiaortuno @udc . edu . ar
      ARAUJO Milagro Fabiola 37159461 mfaraujo @udc . edu . ar
      ARAVENA Maite Ayelen 41952509 maaravena @udc . edu . ar
      ARAVENA ROCHA Marion Ailen 40209703 maaravenarocha @udc . edu . ar
      ARBE Javier Ariel 38150228 jaarbe @udc . edu . ar
      ARCE Adriana Inés 35886906 aiarce @udc . edu . ar
      ARCE Inés Filomena 31500027 ifarce @udc . edu . ar
      ARESTI Ariel Andrés 29559483 aaaresti @udc . edu . ar
      AREVALO Mariela Florinda 31525466 mfarevalo @udc . edu . ar
      ARGAÑARAZ Aimé Nahir 35887034 anarganaraz @udc . edu . ar
      ARGOTA Angel Jesus 35888079 ajargota @udc . edu . ar
      ARIAS Adrian Sabac 26544059 asarias @udc . edu . ar
      ARIAS Oscar Martin 40837929 omarias @udc . edu . ar
      ARMANI Melina Antonella 38803133 maarmani @udc . edu . ar
      ARNEZ TERCEROS Alexander Joel 37699991 ajarneztercero @udc . edu . ar
      AROCA Sofia Gisel 40739334 sgaroca @udc . edu . ar
      ARREDONDO Yasmina Nara Belén 36699471 ynbarredondo @udc . edu . ar
      ARREGUI Vanessa Dayana 40871973 vdarregui @udc . edu . ar
      ARRIAGADA Yuri Nicolás 39441064 ynarriagada @udc . edu . ar
      ARRIEGADA Noelia Fredevinda 34663588 nfarriegada @udc . edu . ar
      ARRIX Luis Orlando 28708026 loarrix @udc . edu . ar
      ARTESI Cristian Miguel 26452004 cmartesi @udc . edu . ar
      ARZA José Gustavo 17643910 jgarza @udc . edu . ar
      ARZA LEON Eliezer Alain 36670537 eaarzaleon1 @udc . edu . ar
      ARZA LEON Eliezer Alain 36760537 eaarzaleon @udc . edu . ar
      ASEFF Alan Bader 38806911 abaseff @udc . edu . ar
      ASENJO Agustin Alejandro 38784580 aaasenjo @udc . edu . ar
      ASENJO Agustina Natalia 41597382 anasenjo @udc . edu . ar
      ASIS Oriel Agata Marilyn 38147337 oamasis @udc . edu . ar
      ASPIROZ Nestor Dario 21000265 ndaspiroz @udc . edu . ar
      ASTUDILLO Graciela Belen 36393045 gbastudillo @udc . edu . ar
      ASTUDILLO Lucas Ezequiel 42316213 leastudillo @udc . edu . ar
      ASTUDILLO Mauricio Nicolás 40385081 mnastudillo @udc . edu . ar
      ASTUDILLO Micaela 41475908 mastudillo @udc . edu . ar
      ASTUDILLO Roxana Isabel 30662481 riastudillo @udc . edu . ar
      ATAMPIZ Andrés Gabriel 24426763 agatampiz @udc . edu . ar
      AUSTIN Facundo Agustin 30284298 faaustin @udc . edu . ar
      AUSTIN Melisa Denice 38803993 mdaustin @udc . edu . ar
      AVENDAÑO Karen Florencia 41793462 kfavendano @udc . edu . ar
      AVENDAÑO CCORCCA José Víctor 94922036 jvavendanoccorcca @udc . edu . ar
      AVILA Hilda Janet 37395091 hjavila @udc . edu . ar
      AVILA Javier Ramón 34936639 jravila @udc . edu . ar
      AVILA Luis Miguel 43373965 lmavila @udc . edu . ar
      AVILES Julieta Belen 42142503 jbaviles @udc . edu . ar
      AWSTIN Yanina Elizabeth 32568641 yeawstin @udc . edu . ar
      AYALA Nadia Emiliana 30744986 neayala @udc . edu . ar
      AYALA Ramiro Nicolas 38806140 rnayala @udc . edu . ar
      AYALA Rocio Mariel 32733097 rmayala @udc . edu . ar
      AYILEF Yolanda Karina 33293633 ykayilef @udc . edu . ar
      AZCONA Mariana Alejandra 27363525 maazcona @udc . edu . ar
      AZCUA JONES Daiana Melisa 36580294 dmazcuajones @udc . edu . ar
      BADIA Leonardo Sebastian 30955146 lsbadia @udc . edu . ar
      BAEZ Alexandra Julieta 40208319 ajbaez @udc . edu . ar
      BAEZA José Luis 33287315 jlbaeza @udc . edu . ar
      BAEZA BAEZA Fernando Rene 18888696 frbaezabaeza @udc . edu . ar
      BAEZA MORALES María Jesús 18892519 mjbaezamorales @udc . edu . ar
      BAHAMONDES Priscila Romina 37149322 prbahamondes @udc . edu . ar
      BAIGORRIA Graciela Alejandra 26888239 gabaigorria @udc . edu . ar
      BALBI Marcelo Daniel 29692030 mdbalbi @udc . edu . ar
      BALDONI Wanda Leylen 42509204 wlbaldoni @udc . edu . ar
      BALLESTEROS Patricia Soledad 28454207 psballesteros @udc . edu . ar
      BARRA Franco Jose Martin 38801129 fjmbarra @udc . edu . ar
      BARRAZA Daniela Macarena 39049043 dmbarraza @udc . edu . ar
      BARRAZA Gisella Stefania 42479810 gsbarraza @udc . edu . ar
      BARRERA Adriana Verónica 32590821 avbarrera @udc . edu . ar
      BARRERA Blanca Celia 39203923 bcbarrera @udc . edu . ar
      BARRERA Evelyn Fabiana 41089679 efbarrera @udc . edu . ar
      BARRERA Leonardo David 30464208 ldbarrera @udc . edu . ar
      BARRIA Antonella Nicol 41040559 anbarria @udc . edu . ar
      BARRIA Maria Cecilia 32574037 mcbarria @udc . edu . ar
      BARRIA María del Carmen 24926789 mdcbarria @udc . edu . ar
      BARRIA Yanina Belen 33771879 ybbarria @udc . edu . ar
      BARRIENTOS Gisel Andrea 33478345 gabarrientos @udc . edu . ar
      BARRIENTOS Nicolas Maximiliano 40700744 nmbarrientos @udc . edu . ar
      BARRIENTOS GALEANO Victor Gerardo 95516109 vgbarrientosgaleano @udc . edu . ar
      BARRIONUEVO David 94965856 dbarrionuevo @udc . edu . ar
      BARRIONUEVO Juliana 36998763 jbarrinuevo @udc . edu . ar
      BARRIONUEVO Juliana 36998763 jbarrionuevo @udc . edu . ar
      BASILIO Veronica Luciana 32334207 vlbasilio @udc . edu . ar
      BATTINI Alexandra Margarita Amina 42358745 amabattini @udc . edu . ar
      BAYON VILLAGRAN Brenda Natali 42047918 bnbayonvillagran @udc . edu . ar
      BEJAR Silvia Beatriz 22615959 sbbejar @udc . edu . ar
      BELEN Anahi Candela 41089611 acbelen @udc . edu . ar
      BELEYZAN Miguela Melina 41351455 mmbeleyzan @udc . edu . ar
      BELL SEGUEL Sofia Luana 40818527 sbell @udc . edu . ar
      BELLIDO Hector David 31148644 hdbellido @udc . edu . ar
      BELLIDO Leonardo Julio 38535287 ljbellido @udc . edu . ar
      BELLIDO Malvina Soledad 36052627 msbellido @udc . edu . ar
      BENAVIDEZ Natali Johana 35030105 njbenavidez @udc . edu . ar
      BENEGAS Celeste Rocio 40182594 crbenegas @udc . edu . ar
      BENITEZ Germán Enrique 31504977 gebenitez @udc . edu . ar
      BENITEZ Sergio Damian 24135329 sdbenitez @udc . edu . ar
      BERGERAT Sergio Daniel 34676396 sdbergerat @udc . edu . ar
      BERNAL Juan Emmanuel 34665068 jebernal @udc . edu . ar
      BERNARDO Ayelén Elizabeth 38806523 aebernardo @udc . edu . ar
      BERTERO Lucas David 32954534 ldbertero @udc . edu . ar
      BERTON Michel 38443490 mberton1 @udc . edu . ar
      BERWYN Loana Yanina 41722206 lyberwyn @udc . edu . ar
      BESGA Silvana 33475713 sbesga @udc . edu . ar
      BESSONE Santiago 27153904 sbessone @udc . edu . ar
      BETTI Gino Fabricio 35099412 gfbetti @udc . edu . ar
      BIDERA AREVALO Abril Valeria 40385145 avbideraarevalo @udc . edu . ar
      BISZCZAK Enrique Mario 23923916 embiszczak @udc . edu . ar
      BLANCO Dulce Melania 38169684 dmblanco @udc . edu . ar
      BLANCO Macarena Anahi 42970069 mablanco @udc . edu . ar
      BLAS GONZALES Miguel Ángel 39664114 mablasgonzales @udc . edu . ar
      BOATO Alejandro Matias 39972674 amboato @udc . edu . ar
      BOBADILLA Claudia Lorena 33771560 clbobadilla @udc . edu . ar
      BOGARIN Enrique Armando 40208030 eabogarin @udc . edu . ar
      BONIFACINI Enzo Fabricio 38535325 efbonifacini @udc . edu . ar
      BOS Maira Katherina 35604098 mkbos @udc . edu . ar
      BOZZONE Mauricio Emanuel 41735406 mebozzone @udc . edu . ar
      BRANDAN Dario Ramon 27363658 drbrandan @udc . edu . ar
      BRAVO Brian Maximiliano 41089772 bmbravo @udc . edu . ar
      BRAVO Cintia Araceli 42670897 cabravo @udc . edu . ar
      BRAVO Doraliza Zulema 30190917 dzbravo @udc . edu . ar
      BRAVO Marcos Nicolas 36106542 mnbravo @udc . edu . ar
      BRIONES Maria Soledad 41267080 msbriones @udc . edu . ar
      BRITO PEREZ Esther del Carmen 31621516 edcbritoperez @udc . edu . ar
      BRIZUELA Diana Noemí 40208165 dnbrizuela @udc . edu . ar
      BRRAS CRUZ Francisco 14281528 fbrrascruz @udc . edu . ar
      BRUNT LEYES Florencia Micaela 37147945 fmbruntleyes @udc . edu . ar
      BRUZZO Matías Agustín 40123090 mabruzzo @udc . edu . ar
      BURGOS Elvio Josue 31802507 ejburgos @udc . edu . ar
      BURGOS Mayra Janet 38535543 mjburgos @udc . edu . ar
      BURGOS Romina Susana 26283714 rsburgos @udc . edu . ar
      BUSSINGER María Marta 24870350 mmbussinger @udc . edu . ar
      BUSTOS Ayelen Alexandra 35382615 aabustos @udc . edu . ar
      BUSTOS Guadalupe Elizabeth 27841290 gebustos @udc . edu . ar
      BUSTOS Jessica Marlene 33616049 jmbustos @udc . edu . ar
      CABALLERO Claudia Alejandra 43807032 cacaballero @udc . edu . ar
      CABALLERO Nicolás Agustín 37149035 nacaballero @udc . edu . ar
      CABEZA Jaquelina Anabella 38518294 jacabeza @udc . edu . ar
      CABRERA Ariana Belen 41220203 abcabrera @udc . edu . ar
      CABRERA Sandra Viviana 27848173 svcabrera @udc . edu . ar
      CACERES Gustavo David 37147910 gdcaceres @udc . edu . ar
      CACERES Yolanda Daniela 33616905 ydcaceres @udc . edu . ar
      CADAGAN Natalia Noemi 26889470 nncadagan @udc . edu . ar
      CAFFA Mariano 26739928 mcaffa @udc . edu . ar
      CAHUASIRI FLORES María Antonia 94532664 macahuasiriflores @udc . edu . ar
      CAIFIL Emilse Paola 40320904 epcaifil @udc . edu . ar
      CAIMI KOENIG María Belén 37067958 mbcaimikoenig @udc . edu . ar
      CALDEDERO Valeria Vanesa 28516634 vvcaldedero @udc . edu . ar
      CALDERON Marcia Maricel 41118902 mmcalderon @udc . edu . ar
      CALFIN Jonathan Gabriel 35172874 jgcalfin @udc . edu . ar
      CALFU Corina Magdalena 36580280 cmcalfu @udc . edu . ar
      CALFU Magali Camila 41017347 mccalfu @udc . edu . ar
      CALFUPAN Linda Florencia 40208162 lfcalfupan @udc . edu . ar
      CALFUPAN Yenifer Ailin 41040806 yacalfupan @udc . edu . ar
      CALISTO MERCADO Roberto Ruben 24682830 rrcalistomercado @udc . edu . ar
      CALONGE Facundo 38597097 fcalonge @udc . edu . ar
      CALVO Carla Tamara 38806889 ctcalvo @udc . edu . ar
      CALVO Juan Manuel 40383341 jmcalvo @udc . edu . ar
      CALVO Lucas Leonardo 36453078 llcalvo @udc . edu . ar
      CAMARGO Daniel Alfredo 36674948 dacamargo @udc . edu . ar
      CAMARGO ESPINOSA Matías Ezequiel 37952522 mecamargoespinosa @udc . edu . ar
      CAMINO Carmen Miriam 40789059 cmcamino @udc . edu . ar
      CAMINOA Gonzalo Ariel 41861754 gacaminoa @udc . edu . ar
      CAMPO Yonatan Yoel 40837801 yycampo @udc . edu . ar
      CAMPOS Evelin Soledad 40922516 escampos @udc . edu . ar
      CAMPOS Jessica Pamela 33392625 jpcampos @udc . edu . ar
      CAMPOS Mariana Fernanda 28682344 mfcampos @udc . edu . ar
      CAMPOS Nora Nadya 42975309 nncampos @udc . edu . ar
      CANDIA Claudia Veronica 25990357 cvcandia @udc . edu . ar
      CANDIA Talia Noemi 36335030 tncandia @udc . edu . ar
      CANESSA Nicolas 36212822 nfcanessa @udc . edu . ar
      CANESSA GUTIERREZ Leandro Ariel 26727364 lacanessagutierrez @udc . edu . ar
      CAPPELLO Azucena Maria Isabel 32189518 amicappello @udc . edu . ar
      CARCAMO Ailen Alexandra 40207880 aacarcamo @udc . edu . ar
      CARCAMO Hugo Marcelo 37067783 hmcarcamo @udc . edu . ar
      CARCAMO María Eugenia 41048894 mecarcamo @udc . edu . ar
      CARCAMO Yanina Vanesa 30596887 yvcarcamo @udc . edu . ar
      CARCAMO Yanina Vanesa 38800046 yvcarcamo1 @udc . edu . ar
      CARCAMO ARRIAGADA Emilse Ayelen 38799838 eacarcamoarriegada @udc . edu . ar
      CARDENAS Marta Ester 41089565 mecardenas @udc . edu . ar
      CARDENAS DIAZ Yesica María 92873575 ymcardenasdiaz @udc . edu . ar
      CARDOSO Angela Sofia 37666009 ascardoso @udc . edu . ar
      CARDOSO Marcos Esteban 37700318 mecardoso @udc . edu . ar
      CARDOZO Anahi Ethel 33392613 aecardozo @udc . edu . ar
      CARDOZO Ezequiel 40039611 ecardozo @udc . edu . ar
      CARDOZO Marcelo Fabian 38805125 mfcardozo @udc . edu . ar
      CARDOZO Nuris Jimena 41793962 njcardozo @udc . edu . ar
      CARDOZO Pablo Gaston 38052924 pgcardozo @udc . edu . ar
      CARIÑANCO Mariana Belén 39441891 mbcarinanco @udc . edu . ar
      CARRANZA REMOLCOY Maria Natalia 39440720 mncarranzaremolcoy @udc . edu . ar
      CARRILLO Nanci Lorena 26546205 nlcarrillo @udc . edu . ar
      CARRIZO Adrian Tecio 31148510 atcarrizo @udc . edu . ar
      CARRIZO JONES Maria de los Angeles 41118890 macarrizojones @udc . edu . ar
      CARRO Pablo Nicolas 34275892 pncarro @udc . edu . ar
      CASANOVA Alicia Mabel 22239943 amcasanova @udc . edu . ar
      CASANOVA Ana Elizabeth 28663179 aecasanova @udc . edu . ar
      CASANOVA Marcelo Andres 41041229 macasanova @udc . edu . ar
      CASANOVA Pablo Ariel 39442893 pacasanova @udc . edu . ar
      CASAROSA Elda Beatriz 32246405 ebcasarosa @udc . edu . ar
      CASIN Carla Vanina 29037331 cvcasin @udc . edu . ar
      CASNER Damiana Nerea 35041430 dncasner @udc . edu . ar
      CASNER Debora Johana 35886902 djcasner @udc . edu . ar
      CASNER Julia Alejandra 26344592 jacasner @udc . edu . ar
      CASNER Sara Sofia 31923498 sscasner @udc . edu . ar
      CASSIA Luciana Belén 41628819 lbcassia @udc . edu . ar
      CASTELLON ROCHA Alexander Didier 39274893 adcastellonrocha @udc . edu . ar
      CASTILLO Alan Eduardo 41722347 aecastillo1 @udc . edu . ar
      CASTILLO Angélica Ernestina 24245512 aecastillo @udc . edu . ar
      CASTILLO Carlos Daniel 36848044 cdcastillo @udc . edu . ar
      CASTILLO Daiana Gisel 31069352 dgcastillo @udc . edu . ar
      CASTILLO Diego Alejandro 39203928 dacastillo @udc . edu . ar
      CASTILLO Florencia Quillén 37550586 fqcastillo @udc . edu . ar
      CASTILLO Kevin Exequiel 41040689 kecastillo @udc . edu . ar
      CASTILLO Nora Noemi 29091866 nncastillo @udc . edu . ar
      CASTILLO VILLANUEVA Evelin Ayelen 35099594 eacastillovillanueva @udc . edu . ar
      CASTRO Dalma Yanet 39442079 dycastro @udc . edu . ar
      CASTRO Kevin 35887288 kcastro @udc . edu . ar
      CASTRO Lia del Carmen 25311322 ldccastro @udc . edu . ar
      CASTRO Mirta Haydeé 23998616 mhcastro @udc . edu . ar
      CATALAN Daniela Yamila 38518420 dycatalan @udc . edu . ar
      CATALAN Yolanda Anahí 32650150 yacatalan @udc . edu . ar
      CATAN Alexis Ramón 40385726 arcatan @udc . edu . ar
      CATRIMAN Malvina Soledad 37347137 mscatriman @udc . edu . ar
      CAUCUMAN Axel Carlos Aaron 41118784 acacaucuman @udc . edu . ar
      CAYO Jessica Romina 33478471 jrcayo @udc . edu . ar
      CAYO Victoria Belen 40384150 vbcayo @udc . edu . ar
      CAYULEF Claudia Maria 33197614 cmcayulef @udc . edu . ar
      CAYULEF Moira Macarena 46080406 mmcayulef @udc . edu . ar
      CAYULEO Daiana Andrea 35385371 dacayuleo @udc . edu . ar
      CAÑULEF Marcela Carina 26944747 mccanulef @udc . edu . ar
      CAÑUMIL Flavia Elizabeth 36213041 fecanumil @udc . edu . ar
      CAÑUMIR Romina Daniela 41041398 rdcanumir @udc . edu . ar
      CAÑUMIR Rosana Elizabeth 27975141 recanumir @udc . edu . ar
      CCALLIZANA VILCA Moises 94308005 mccallizanavilca @udc . edu . ar
      CEBALLOS Jaime Antonio 29260319 jaceballos @udc . edu . ar
      CENA Sol Ailen 41551093 sacena @udc . edu . ar
      CENDRA Gabriel Omar 25724860 gocendra @udc . edu . ar
      CENTENO Chiara María Milagros 40735122 cmmcenteno @udc . edu . ar
      CENTENO Sofia Guadalupe 41597676 sgcenteno @udc . edu . ar
      CENTURION Marcia Veronica 27825340 mvcenturion @udc . edu . ar
      CEREZO Giselle Mailén 38232391 gmcerezo @udc . edu . ar
      CERNA Edgardo Gabriel 39649710 egcerna @udc . edu . ar
      CERUTTI Amiel Malén 38730113 amcerutti @udc . edu . ar
      CERUTTI Antú Nehuen 38711526 ancerutti @udc . edu . ar
      CERVERO Graciela Mariel 39440373 gmcervero @udc . edu . ar
      CHACANO Solange Aldana 41861541 sachacano @udc . edu . ar
      CHALABE Sebastián Emmanuel 28054902 sechalabe @udc . edu . ar
      CHAMORRO AZUAGA Débora Soledad 31829253 dschamorroazuaga @udc . edu . ar
      CHAPINGO Evelyn Magali 40818418 emchapingo @udc . edu . ar
      CHARIANO Milagros Nazarena 42209343 mnchariano @udc . edu . ar
      CHAURA Marcela Alejandra 28019130 machaura @udc . edu . ar
      CHAVES Silvana de los Angeles 23953979 sdlachavez @udc . edu . ar
      CHAVEZ Sofia Aldana 38806134 sachavez @udc . edu . ar
      CHICO Mauro Adrian 36757042 machico @udc . edu . ar
      CHINELI Natalia Paola 23600999 npchineli @udc . edu . ar
      CHINGOLEO Juan Carlos 29419898 jcchingoleo @udc . edu . ar
      CHINGOLEO CORTES Adriana Belen 41525893 abchingoleocortes @udc . edu . ar
      CHIOTTA Alexis Ezequiel 40384920 achiotta @udc . edu . ar
      CHIQUICHANO Marilyn Soledad 35382632 mschiquichano @udc . edu . ar
      CHOQUE Gloria 22335520 gchoque @udc . edu . ar
      CHOQUE Juan Carlos 25577785 jcchoque @udc . edu . ar
      CHOSPI Carlos Ramiro 38807330 crchospi @udc . edu . ar
      CHUQUE VALENCIA Dennys Angelica 94532584 dachuquevalencia @udc . edu . ar
      CIFUENTES Milagros Antonella 41861576 macifuentes @udc . edu . ar
      CIRIACO Maira Anahy 36650741 maciriaco @udc . edu . ar
      CISNEROS Alexia Rosa Cristina 39148833 arccisneros @udc . edu . ar
      CLADERA Ligia Judit 21696356 ljcladera @udc . edu . ar
      CLAROS GONZALES María Leticia 92845898 mlclarosgonzales @udc . edu . ar
      CLAVIO Agustin Jesus 38801543 ajclavio @udc . edu . ar
      COLAZO Carla 28808143 ccolazo @udc . edu . ar
      COLEMIL Lidia Susana 38806873 lscolemil @udc . edu . ar
      COLIHUINCA Ana María 30596749 amcolihuinca @udc . edu . ar
      COLIL MATAMALA Ignacio Agustín 40208683 iacolilmatamala @udc . edu . ar
      COLINECUL Jessica Daniela 36587753 jdcolinecul @udc . edu . ar
      COLINECUL Marisa Flora 29212042 mfcolinecul @udc . edu . ar
      COLOMBRES Nicolas Adrian 37395445 nacolombres @udc . edu . ar
      COLQUI Maximiliano David 38147731 mdcolqui @udc . edu . ar
      CONDORI Johana Romina 38806807 jrcondori @udc . edu . ar
      CONDORI Monica 40468924 mcondori @udc . edu . ar
      CONDORÍ Ángel David 40207477 adcondori @udc . edu . ar
      CONEJEROS Axel Gerardo 39204037 agconejeros @udc . edu . ar
      CONEJEROS Mayra Daniela 37149145 mdconejeros @udc . edu . ar
      CONSIGLIO Ailen Nicole 42771836 anconsiglio @udc . edu . ar
      CONTI Belén 40881954 bconti @udc . edu . ar
      CONTIN Paula Soledad 33315780 psconti @udc . edu . ar
      CONTRERA Mabel Gladys 26257073 mgcontrera @udc . edu . ar
      CONTRERAS Esteban Federico 38803788 efcontreras @udc . edu . ar
      CONTRERAS Fabian Alberto 41475946 facontreras @udc . edu . ar
      CONTRERAS Rocio Elizabeth 41735203 recontreras @udc . edu . ar
      CONTRERAS Roxana Anabel 38804016 racontreras @udc . edu . ar
      CONUEL Brenda Gisella 41430973 bgconuel @udc . edu . ar
      CORNELIO OLSINA Juan Pablo 38535288 jpcornelioolsina @udc . edu . ar
      CORONAO Patricia Alejandra 24086866 pacoronao @udc . edu . ar
      CORONEL Edna Edith 36321165 eecoronel @udc . edu . ar
      CORRALES Karina Agustina 41040784 kacorrales @udc . edu . ar
      CORRO Agustina Daniela 36757152 adcorro @udc . edu . ar
      CORRO Cynthia Tamara 31504857 ctcorro @udc . edu . ar
      CORRO Noel Alejandra 40209616 nacorro @udc . edu . ar
      CORTEZ Cyntia Janet Dalinda 35887317 cjdcortez @udc . edu . ar
      CORTEZ Veronica del Valle 36432365 vdvcortez @udc . edu . ar
      CORTEZ ANTILAF Celeste Noemi 38801508 cncortezantilaf @udc . edu . ar
      COSCARARTE Cristian Hernan 28150011 chcoscararte @udc . edu . ar
      COSTA Claudia Alejandra 30673830 cacosta @udc . edu . ar
      COSTANCIO Luana Ailen 42316098 lacostancio @udc . edu . ar
      CRETTON Anabella 37347885 acretton @udc . edu . ar
      CRETTON Antonela Agostina 39443158 aacretton @udc . edu . ar
      CRETTON Maximiliana 38800290 mcretton @udc . edu . ar
      CRISTALDO GIMENEZ Noelia Estefania 36674147 necristaldogimenez @udc . edu . ar
      CRUZ Paola Veronica 41118523 pvcruz @udc . edu . ar
      CRUZADO Gonzalo Gabriel 38801640 ggcruzado @udc . edu . ar
      CUAL Maria Angelica 42699821 macual @udc . edu . ar
      CUELLO Tatiana Ailen 37067864 tacuello @udc . edu . ar
      CUELLO Yamila Adriana 37118491 yacuello @udc . edu . ar
      CURAMIL Daniela Ayelen 42408237 dacuramil @udc . edu . ar
      CURAPIL Daiana Antonella 42020320 dacurapil @udc . edu . ar
      CURICHE Bárbara Celeste 38505536 bccuriche @udc . edu . ar
      CURICHE Roxana Noelia 33464936 rncuriche @udc . edu . ar
      CURILLAN Andrea Belen 36650762 abcurillan @udc . edu . ar
      CURIMAN VARGAS Nadia Liliana 28054561 nlcurimanvargas @udc . edu . ar
      CURIMIL Andrea 38804275 acurimil @udc . edu . ar
      CURINAO Elizabeth Laura 30163054 elcurinao @udc . edu . ar
      CURIQUEO Cesar Matias 39443529 cmcuriqueo @udc . edu . ar
      CURIQUEO Evelyn Daniela 38711025 edcuriqueo @udc . edu . ar
      CURIQUEO Leonardo Daniel 36334528 dlcuriqueo @udc . edu . ar
      CURIÑANCO Mirta Alejandra 33222551 macurinanco @udc . edu . ar
      CURRUMIL Braian German 41619275 bgcurrumil @udc . edu . ar
      CURRUMIL Leonardo Alexis 40739028 lacurrumil @udc . edu . ar
      CURRY Araceli Belén 40985702 abcurry @udc . edu . ar
      CURUALA Ronan Joel 40207358 rjcuruala @udc . edu . ar
      CUSIN Pablo Nicolas 26731044 pncusin @udc . edu . ar
      CUYUL CANTONI Mariano 34275972 mcuyulcantoni @udc . edu . ar
      CZABANYI Alejandra Noemi 33772035 anczabanyi @udc . edu . ar
      D ASTOLFO Lucia Alejandra 31773113 ladastolfo @udc . edu . ar
      D 'EMILIO	Yanina Lucía	38623958	yldemilio@udc.edu.ar
DADIN	Roberto Sergio José	27516020	rsjdadin@udc.edu.ar
DE BERNARDEZ	Julián	40045532	jdebernardez@udc.edu.ar
DE HERNANDEZ	Federico Gastón	35357203	fgdehernandez@udc.edu.ar
DE LA VEGA	Mariana Paula	29581559	mpdelavega@udc.edu.ar
DE LUCIA	Debora Salome	42208535	dsdelucia@udc.edu.ar
DELGADO	Lucas Agustin	40208100	ladelgado@udc.edu.ar
DELGADO	María del Rosario	39362578	mdrdelgado@udc.edu.ar
DELGADO	Maximiliano Jesús	32568795	mjdelgado@udc.edu.ar
DELGADO	Sabrina Candela	40872041	scdelgado@udc.edu.ar
DELLOCCA	Maximo Adolfo	30883543	madellocca@udc.edu.ar
DEMARES	Aldana Berenice	40232430	abdemares@udc.edu.ar
DENCOR	Karina Ivana	25407868	kidencor@udc.edu.ar
DENING REA	Ethel Frida	41017142	efdeningrea@udc.edu.ar
DEPASQUALI	María Laura	29493903	mldepasquali@udc.edu.ar
DEVE	Daiana Estefania	37616781	dedeve@udc.edu.ar
DEVINCENZI AGUIRRE	Anabella Cecilia	41597607	acdevincenziaguirre@udc.edu.ar
DI FEBO	Melitza Erica Edith	38805061	meedifebo@udc.edu.ar
DI GIGLIO	Stella Maris	38232503	smdigiglio@udc.edu.ar
DI NARDO	Alejandra Marcela	23489091	amdinardo@udc.edu.ar
DIAZ	Auristela	41041037	adiaz@udc.edu.ar
DIAZ	German Ariel	33679389	gadiaz@udc.edu.ar
DIAZ	Gisela Marysol	35685236	gmdiaz@udc.edu.ar
DIAZ	Javier José	29920474	jjdiaz@udc.edu.ar
DIAZ	Jessie Daria Giuliana	39204039	jdgdiaz@udc.edu.ar
DIAZ	Juan Pablo Noe	41267057	jpndiaz@udc.edu.ar
DIAZ	Liliana	24974707	ldiaz@udc.edu.ar
DIAZ	Lucia Gabriela	41267450	lgdiaz@udc.edu.ar
DIAZ	Natalia Soledad	29109246	nsdiaz@udc.edu.ar
DIAZ	Sofia Gabriela	37860326	sgdiaz@udc.edu.ar
DIAZ	Walter Guillermo	41722361	wgdiaz@udc.edu.ar
DIAZ BALBOA	Maria Luzvenia	18897390	mldiazbalboa@udc.edu.ar
DIAZ MARTINEZ	Vanesa Alejandra	24562536	vadiazmartinez@udc.edu.ar
DOMECQ	Santiago	21354913	sdomecq1@udc.edu.ar
DOMECQ	Santiago	42208740	sdomecq@udc.edu.ar
DOMINGUEZ	Cristian Rodrigo	37909665	crdominguez@udc.edu.ar
DOMINGUEZ	Diana Lorena	41861774	dldominguez@udc.edu.ar
DOMINGUEZ	Marcelo Ricardo	32018177	mrdominguez@udc.edu.ar
DOMINGUEZ SANDOVAL	Pamela Anahi	39600900	padominguezsandoval@udc.edu.ar
DORADO	Dante Elias	36579737	dedorado@udc.edu.ar
DUBOIS	Erica Valeria	26976524	evdubois@udc.edu.ar
DUHALDE	Gisela Belén	30580039	gbduhalde@udc.edu.ar
DUNRAUF	Monica Magali	40837852	mmdunrauf@udc.edu.ar
D´ANUNZIO	Marcelo Fabián	20491922	mfdanunzio@udc.edu.ar
ECHEGARAY	Milagros Belen	42208633	mbechegaray@udc.edu.ar
ELIAS	Camila Rocio	41628855	crelias@udc.edu.ar
ELIAS	Guisella Rosemarie	36334564	grelias@udc.edu.ar
ELIAS	Zahira Nair	42068957	znelias@udc.edu.ar
ENCINAS	Luis Alberto	29812486	laencinas@udc.edu.ar
ENCINAS RAMIREZ	Marian Melania	37700036	mmencinasramirez@udc.edu.ar
ENRIQUE	Rosa Noemí	30517705	rnenrique@udc.edu.ar
ENTRAIGAS	Andrea Pamela	32568884	apentraigas@udc.edu.ar
EPUL	Jessica Gabriela	38803742	jgepul@udc.edu.ar
EPULEF	Estela Linda	35887018	elepulef@udc.edu.ar
EPULEF	Francisco Alejandro	42153588	faepulef@udc.edu.ar
EPULEF SEPULVEDA	Nerea Ayelen	39440935	naepulefsepulveda@udc.edu.ar
ESCALANTE	Andrea Lorena	36760576	alescalante@udc.edu.ar
ESCALANTE	Mariana Marilu	30515143	mmescalante@udc.edu.ar
ESCOBAR	Gabriela Soraya	38052920	gsescobar@udc.edu.ar
ESCOBAR	Lorena Pamela	38518110	lpescobar@udc.edu.ar
ESCOBAR	Romina Soledad	29581264	rsescobar@udc.edu.ar
ESPARZA	Daiana Mariel	33392634	dmesparza@udc.edu.ar
ESPINDOLA	Sandra Yanina	34140606	syespindola@udc.edu.ar
ESPINOSA	Johana Mariel	38535502	jmespinosa@udc.edu.ar
ESPINOSA VARGAS	Melisa Andrea	30883718	maespinosavargas@udc.edu.ar
ESQUIVEL QUIROZ	Florencia Veronica	38769831	fvesquivelquiroz@udc.edu.ar
ESTRADA	Juana Rocio	38805369	irestrada@udc.edu.ar
ESTRADA VIVANCO	Patricia Maria	93992823	pmestradavivanco@udc.edu.ar
ESTREMADOR	Xiomara	37347891	xestremador@udc.edu.ar
FALCON	Daniela Antonella	37147724	dafalcon@udc.edu.ar
FALCON	Nicolas Dario	33611250	ndfalcon@udc.edu.ar
FANIA	Lucia De Los Angeles	32887869	ldlafania@udc.edu.ar
FARFAN	Roberto Marcelo	28133691	rmfarfan@udc.edu.ar
FARIAS	Santiago Daniel	44027077	sdfarias@udc.edu.ar
FASSANO	Micaela Ayelen	42898428	mafassano@udc.edu.ar
FELIPE FERRUFINO	Anahi Lizeth	94895549	alfelipeferrufino@udc.edu.ar
FEMENIAS	Nadia Veronica	31985409	nvfemenias@udc.edu.ar
FERNANDEZ	Alejandra Beatriz	38800026	abfernandez@udc.edu.ar
FERNANDEZ	Carla Antonella	40209943	cafernandez@udc.edu.ar
FERNANDEZ	Cristian David	39441088	cdfernandez@udc.edu.ar
FERNANDEZ	Eduardo Gabriel	17315832	egfernandez@udc.edu.ar
FERNANDEZ	Erika Aldana	41787329	eafernandez@udc.edu.ar
FERNANDEZ	Gabriela Gisel	35172891	ggfernandez@udc.edu.ar
FERNANDEZ	Ivana Micaela	30976498	imfernandez@udc.edu.ar
FERNANDEZ	Jorge Santiago Alexis	37757389	jsafernandez@udc.edu.ar
FERNANDEZ	Juan de la Cruz	29553721	jdlcfernandez@udc.edu.ar
FERNANDEZ	Maria Gimena	41597340	mgfernandez@udc.edu.ar
FERNANDEZ	Matías Gabriel	39443540	mgfernandez@udc.edu.ar
FERNANDEZ	Melina Aime	41041234	mafernandez@udc.edu.ar
FERNANDEZ	Miriam Yohana	39443259	myfernandez@udc.edu.ar
FERNANDEZ	Nicolás Héctor	31473916	hnfernandez@udc.edu.ar
FERNANDEZ	Noelia Ayelen	36212746	nafernandez@udc.edu.ar
FERNANDEZ	Romina Gisella	37067816	rgfernandez@udc.edu.ar
FERNANDEZ	Silvina	29511637	spfernandez@udc.edu.ar
FERNANDEZ ARENAS	Analia Gabriela	32806402	agfernandezarenas@udc.edu.ar
FERNANDEZ SILVA	Solana	40837882	sfernandezsilva@udc.edu.ar
FERRA	Vanesa	29294183	vferra@udc.edu.ar
FERRANDO	Juliana	38805573	jferrando@udc.edu.ar
FERREIRA	Evelio Alexi	32748782	eaferreira@udc.edu.ar
FERRER	Federico Fermin	38419267	ffferrer@udc.edu.ar
FERRERO	Maria Cecilia	26344338	mcferrero@udc.edu.ar
FIGUEROA	Gabriel Josué	37364202	gjfigueroa@udc.edu.ar
FIGUEROA	Marta Maria Agustina	40631010	mmafigueroa@udc.edu.ar
FIGUEROA	Matias Gabriel	41040598	mgfigueroa@udc.edu.ar
FIGUEROA	Melissa Fiorella	42133087	mffigueroa@udc.edu.ar
FILIPPONI	Daniel Alejandro	29820243	dafilipponi@udc.edu.ar
FLORES	Barbara Yaquelin	36914480	byflores@udc.edu.ar
FLORES	Braian Martin	40208012	bmflores@udc.edu.ar
FLORES	Damaris Patricia	34540894	dpflores@udc.edu.ar
FLORES	Daniela Fernanda	27177200	dfflores@udc.edu.ar
FLORES	Ivon Andrea Yanina	39439743	iayflores@udc.edu.ar
FLORES	Joana Micaela	42408284	jmflores@udc.edu.ar
FLORES	Luis Alejandro	33409281	laflores@udc.edu.ar
FLORES	Marlene Micaela	41267497	mmflores@udc.edu.ar
FLORES	Melina de los Angeles	36393053	mdlaflores@udc.edu.ar
FLORES	Pablo Gaspar	24689922	pgflores@udc.edu.ar
FLORES	Susana Elizabeth	37150817	seflores@udc.edu.ar
FOGOLIN	Diego Gabriel	22209631	dgfogolin@udc.edu.ar
FONTANA	Brenda Ayelen	39760430	bafontana@udc.edu.ar
FORD	Lucas Javier	32890907	ljford@udc.edu.ar
FRANCO	Carlos Leandro	31514034	clfranco@udc.edu.ar
FRANCO	Silvana Florencia	34328362	sffranco@udc.edu.ar
FREEMAN	Gonzalo Daniel	38806117	gdfreeman@udc.edu.ar
FREEMAN	Horacio Santiago	42636909	hsfreeman@udc.edu.ar
FREITES ARIAS	Oscar Jose	22507298	ojfreitesarias@udc.edu.ar
FRIAS	Laura Pamela	41793204	lpfrias@udc.edu.ar
FUENTEALBA	José María	39443532	jmfuentealba@udc.edu.ar
FUENTEALBA	Sayi	41619100	sfuentealba@udc.edu.ar
FUENTEALBA PEÑA	Miriam Elizabeth	36213056	mefuentealbapena@udc.edu.ar
FUENTES	Claudia Estefania	38518258	cefuentes@udc.edu.ar
FUENTES	Veronica Betiana	26958631	vbfuentes@udc.edu.ar
FUENTES FERNANDEZ	Iara Camila	42153183	icfuentesfernandez@udc.edu.ar
FUSIMAN	Jorge Isaias	29692063	jifusiman@udc.edu.ar
GAGO	Mahite Muriel	38535872	mmgago@udc.edu.ar
GAGO TERRON	Gustavo Marcos	18065303	gmgagoterron@udc.edu.ar
GAITAN	Lorena Andrea	32538048	lagaitan@udc.edu.ar
GALBAN	Lara	36359079	lgalban@udc.edu.ar
GALBAN	Nicolas	38687195	ngalban@udc.edu.ar
GALIANO	Giuliano Nahuel	41628854	gngaliano@udc.edu.ar
GALIANO	Sofia Belen	38147747	sbgaliano@udc.edu.ar
GALLARDO	Alberto Nicolás	34488598	angallardo@udc.edu.ar
GALLARDO	Maria Fernanda	35215509	mfgallardo@udc.edu.ar
GALLARDO	Maricel	34276516	mgallardo@udc.edu.ar
GALLARDO	Mónica del Carmen	33478459	mdcgallardo@udc.edu.ar
GALLEGOS	Roxana Anabela	41957418	ragallegos@udc.edu.ar
GALLICCHIO	Rocio Belén	39267191	rbgallicchio@udc.edu.ar
GALLO	Lucas Nicolás	36911617	lngallo@udc.edu.ar
GALVAN	Karen Daiana	38803130	kdgalvan@udc.edu.ar
GALVAN	Micaela Ayelen	39441351	magalvan@udc.edu.ar
GAMBOA PEREZ	Melvy	92994073	mgamboaperez@udc.edu.ar
GANGA	Edgardo Alexis	27103041	eaganga@udc.edu.ar
GANGAS	Denis Alberto	37147545	dagangas@udc.edu.ar
GANGAS	Melisa Darlene	38046386	mdgangas@udc.edu.ar
GARAY	Micaela Yasmin	35604223	mygaray@udc.edu.ar
GARAY	Pamela Jeannette	38300404	pjgaray@udc.edu.ar
GARAY	Rocio Jennifer	40209200	rjgaray@udc.edu.ar
GARCES	Betiana Griselda	33772004	bggarces@udc.edu.ar
GARCETE	Maria Florencia	36216101	mfgarcete@udc.edu.ar
GARCIA	Brisa Yamila	41793963	bygarcia@udc.edu.ar
GARCIA	Daiana Alejandra	37699953	dalgarcia@udc.edu.ar
GARCIA	Dalma Araceli	36393177	dagarcia@udc.edu.ar
GARCIA	Daniela Paola	38819928	dpgarcia@udc.edu.ar
GARCIA	Dayana Florencia	41089531	dfgarcia@udc.edu.ar
GARCIA	Florencia Ayelen	38804692	fagarcia@udc.edu.ar
GARCIA	Gaspar Hugo	38806797	ghgarcia@udc.edu.ar
GARCIA	Laura Natali	39897621	lngarcia@udc.edu.ar
GARCIA	Lucas Andrés	40386881	lagarcia@udc.edu.ar
GARCIA	Lucas Rafael	36321252	lrgarcia@udc.edu.ar
GARCIA	Marcela Romina	37395396	mrgarcia@udc.edu.ar
GARCIA	Mariana Anabel	38804795	magarcia@udc.edu.ar
GARCIA	Micaela Dinorah	37860590	mdgarcia@udc.edu.ar
GARCIA	Oscar Daniel	24811714	odgarcia@udc.edu.ar
GARCIA	Raul Alberto	41040745	ragarcia@udc.edu.ar
GARCIA	Rocio Magali	42133094	rmgarcia@udc.edu.ar
GARCIA	Valeria Solange	36321817	vsgarcia@udc.edu.ar
GARCIA  AGUILAR	Emmanuel Yain Nehuen	36393094	eygarciaaguilar@udc.edu.ar
GARCIA  AMPARO	Devorah Dolores	94245219	ddgarciaamparo@udc.edu.ar
GARCIA  ARCIJA	Macarena Belén	38801366	mbgarciaarcija@udc.edu.ar
GARDINE	Laura Nadina	42274300	lngardine@udc.edu.ar
GARMENDIA GARAY	Oriana Ailen	42479835	oagarmendiagaray@udc.edu.ar
GARRAZA	Mariela Alejandra	34665694	magarraza@udc.edu.ar
GASPAR	Elisa Belen	39200203	ebgaspar@udc.edu.ar
GASSER	Gissel Natali	36321933	gngasser@udc.edu.ar
GATICA	Franco Daniel	38804719	fdgatica@udc.edu.ar
GATICA	Marcelo Javier	34488586	mjgatica@udc.edu.ar
GELVEZ	Julián Oscar	31504948	jogelvez@udc.edu.ar
GENOVA	Karen Gisele	37347046	kggenova@udc.edu.ar
GEREZ	Claudia Lorena	27403404	clgerez@udc.edu.ar
GEREZ	Jaquelina Cristina	24449302	jcgerez@udc.edu.ar
GEREZ	Valeria Ayelen	41267015	vagerez@udc.edu.ar
GERMANIEZ	Estela Mary	17900664	emgermaniez@udc.edu.ar
GIANNINI	Laura Susana	22338362	lsgiannini@udc.edu.ar
GIBBON	Ioana Graciela	27403003	iggibbon@udc.edu.ar
GILARDON	Maria Isabel	5889113	migilardon@udc.edu.ar
GIMENEZ	Guadalupe Antonella	35888377	gagimenez@udc.edu.ar
GIMENEZ	Sandra Fabiana	21518230	sfgimenez@udc.edu.ar
GIRARDINI	María Norma Itati	28055137	mnigirardini@udc.edu.ar
GODOY	Joaquin	41735365	jgodoy@udc.edu.ar
GODOY IBAÑEZ	Erica Elizabeth	27986653	eegodoyibanez@udc.edu.ar
GOGORZA	Macarena	29555190	mgogorza@udc.edu.ar
GOHNER	Claudia Andrea	29212174	cagohner@udc.edu.ar
GOMEZ	Arnaldo Andrés	32229161	aagomez@udc.edu.ar
GOMEZ	Camila Fabiana	35886975	cfgomez@udc.edu.ar
GOMEZ	Carmen Graciela	17857193	cggomez@udc.edu.ar
GOMEZ	Claudia Veronica	36876948	cvgomez@udc.edu.ar
GOMEZ	Ines Estefania	36250918	iegomez@udc.edu.ar
GOMEZ	Javier Adrian	35922378	jagomez@udc.edu.ar
GOMEZ	Juan Manuel	33392775	jmgomez@udc.edu.ar
GOMEZ	Lorena Ayelen	37150702	lagomez@udc.edu.ar
GOMEZ	Matias Alejandro	42020472	magomez@udc.edu.ar
GOMEZ	Pamela Itati	31635898	pigomez@udc.edu.ar
GOMEZ	Virginia Celia	24554690	vcgomez@udc.edu.ar
GONZALES SANCHEZ	Dante Luciano	41118962	dlgonzalessanchez@udc.edu.ar
GONZALEZ	Claudia Daniela	39443333	cdgonzalez@udc.edu.ar
GONZALEZ	Cristian Fernando	38807780	cfgonzalez@udc.edu.ar
GONZALEZ	Daiana Andrea	37148314	dagonzalez@udc.edu.ar
GONZALEZ	Daiana Gisela	37347356	dggonzalez@udc.edu.ar
GONZALEZ	Daniel Noe	24926620	dnrodriguez@udc.edu.ar
GONZALEZ	Erika Karen	38800554	ekgonzalez@udc.edu.ar
GONZALEZ	Fiorela Rocio	40209084	frgonzalez@udc.edu.ar
GONZALEZ	Francisco Arnaldo	24400131	fagonzalez@udc.edu.ar
GONZALEZ	Joana Elizabeth	38800043	jegonzalez@udc.edu.ar
GONZALEZ	Luciano Federico	38147446	lfgonzalez@udc.edu.ar
GONZALEZ	Marcos Alexis	28949416	magonzalez@udc.edu.ar
GONZALEZ	Maria Elisa	35010992	megonzalez@udc.edu.ar
GONZALEZ	Mayra Ayelen	40818635	magonzalez1@udc.edu.ar
GONZALEZ	Melisa Mariel	32801310	mmgonzalez@udc.edu.ar
GONZALEZ	Milagros Veronica Itati	40279958	mvigonzalez@udc.edu.ar
GONZALEZ	Roberto Claudio	26460440	rcgonzalez@udc.edu.ar
GONZALEZ	Rocio Yasmín	40872100	rygonzalez@udc.edu.ar
GONZALEZ	Sabrina Araceli	40206711	sagonzalez@udc.edu.ar
GONZALEZ	Valeria Marion	40072612	vmgonzalez@udc.edu.ar
GONZALEZ CIGUDOSA	Maria Florencia	35171541	mfgonzalezcigudosa@udc.edu.ar
GONZALEZ IBAÑEZ	Brenda Ayelén	39441248	bagonzalezibanez@udc.edu.ar
GONZALEZ SANCHEZ	María Belén	38807503	mbgonzalezsanchez@udc.edu.ar
GONZALEZ VAQUERA	Ailin Eunice	41238602	aegonzalezvaquera@udc.edu.ar
GONZÁLEZ	Gabriela	27841134	ggonzalez@udc.edu.ar
GORT	Nicolás	32887754	ngort@udc.edu.ar
GRAMAJO DEL VALLE	Gisela	41869601	ggramajodelvalle@udc.edu.ar
GRANDE	Daisi Marlene	37347829	dmgrande@udc.edu.ar
GRIFFITHS	Diana Elizabeth	36760538	degriffiths@udc.edu.ar
GRIFFITHS	Marianela Carol	27583059	mcgriffiths@udc.edu.ar
GRIGOR	Virginia Lorena	24915118	vlgrigor@udc.edu.ar
GROSCH	Fabiana Estefania	38046075	fegrosch@udc.edu.ar
GUAIMAS	Erica Magdalena	35888185	emguaimas@udc.edu.ar
GUAJARDO	Melisa Lucia	38518251	mlguajardo@udc.edu.ar
GUAJARDO	Natalia Aime	34665149	naguajardo@udc.edu.ar
GUALA	Marilyn Yamilen	37067443	myguala@udc.edu.ar
GUALDA	Nicolás	27535910	ngualda@udc.edu.ar
GUAQUIN	Jessica Vanina	33773246	jvguaquin@udc.edu.ar
GUARDIA MONTENEGRO	Delia	95414821	dguardia@udc.edu.ar
GUAYANES	Daniela Abril	42408825	daguayanes@udc.edu.ar
GUEICHA	Tamara Janet	38805793	tjgueicha@udc.edu.ar
GUEINASSO	Karina Beatriz	22479361	kbgueinasso@udc.edu.ar
GUEVARA	Tamara Marisol	41089954	tmguevara@udc.edu.ar
GUIDO LAVALLE	Maria  Pilar	34199921	mpguidolavalle@udc.edu.ar
GUTIERREZ	Jessica Roxana	33290958	jrgutierrez@udc.edu.ar
GUTIERREZ	Raul Gonzalo	30855099	rggutierrez@udc.edu.ar
GUTIERREZ ARTILES	Natacha Rocío	38147519	nrgutierrezartiles@udc.edu.ar
GUTIERREZ JORQUERA	Amelia del Carmen	34275618	adcgutierrezjorquera@udc.edu.ar
GUTIERREZ ROJAS	Malena Belen	41118505	mbgutierrezrojas@udc.edu.ar
GUZMAN	Andrea Camila	39573423	acguzman@udc.edu.ar
GUZMAN	Maria Belen	27322543	mbguzman@udc.edu.ar
GUZMAN	Nora Emiliana	37347767	neguzman@udc.edu.ar
GUZMAN	Pablo Benjamin	41089637	pbguzman@udc.edu.ar
GUZMAN	Roxana Dalma Judith	38974462	rdjguzman@udc.edu.ar
GUZMAN CHOQUE	David	95382176	dguzmanchoque@udc.edu.ar
GUZMAN RINALDI	Sofia Julieta	36757445	sjguzmanrinaldi@udc.edu.ar
HARO	Albertina	21489450	aharo@udc.edu.ar
HARTMANN LAESPRELLA	Paula	18792775	pahartmannlaesprella@udc.edu.ar
HEINDL	Jesica Paola	32851077	jpheindl@udc.edu.ar
HENRIQUEZ	Juan Martin	35381938	jmhenriquez@udc.edu.ar
HENRIQUEZ CALFULLANCA	Marta Soledad	35383523	mshenriquezcalfullanca@udc.edu.ar
HERMOSILLA	Felicita Audilia	35694174	fahermosilla@udc.edu.ar
HERNANDEZ	Ana Belén	35786082	abhernandez@udc.edu.ar
HERNANDEZ	Andrea Soledad	36991552	ashernandez@udc.edu.ar
HERNANDEZ	Diego Abel	35171694	dahernandez1@udc.edu.ar
HERNANDEZ	Noemi Elizabet	33470514	nehernandez@udc.edu.ar
HERNANDEZ	Oscar Alberto	18503444	oahernandez@udc.edu.ar
HERNANDEZ GARCIA	Fernando Javier	37149394	fjhernandezgarcia@udc.edu.ar
HERNANDEZ OTAÑO	Danilo	92280570	dhernandezotano@udc.edu.ar
HERRERA	Denis Fabricio	42408248	dfherrera@udc.edu.ar
HERRERA	Jessica Vanesa	35886806	jvherrera@udc.edu.ar
HERRERA	Olga Angélica	28018912	oaherrera@udc.edu.ar
HERRERA	Rocio Belen	28055188	rbherrera@udc.edu.ar
HIDALGO	Claudia Elisabet	22418247	cehidalgo@udc.edu.ar
HIDALGO	Maximiliano José	28664663	mjhidalgo@udc.edu.ar
HINOJOSA PINTO	María del Carmen	38434046	mdchinojosapinto@udc.edu.ar
HINOJOSA PINTO	Yessica Noemi	41735152	ynhinojosapinto@udc.edu.ar
HOFFMANN	Melania	40152123	mhoffmann@udc.edu.ar
HOLM	MARIANELA	33115531	mholm@udc.edu.ar
HUAIQUILAF	Carla Jacqueline	42133182	cjhuaiquilaf@udc.edu.ar
HUAYQUILAF	Marta Gladis	24545017	mghuayquilaf1@udc.edu.ar
HUAYQUIMILLA	Mauro Javier	39441965	mjhuayquimilla@udc.edu.ar
HUENCHUAL	Norma Beatriz	18568029	nbhuenchual@udc.edu.ar
HUENCHUMAN	Alexis Gabriel	41793917	aghuenchuman@udc.edu.ar
HUENCHUMAN	Brian Emanuel	40207375	behuenchuman@udc.edu.ar
HUENCHUMAN	Carina De Los Angeles	33293641	cdlahuenchuman@udc.edu.ar
HUENCHUMAN	José Marcelo	40207388	jmhuenchuman@udc.edu.ar
HUENCHUN	Gabriel Alejandro	36192346	gahuenchun@udc.edu.ar
HUENELAF	Daiana Magali	38807033	dmhuenelaf@udc.edu.ar
HUENELAF	Tamara Belen	37676688	tbhuenelaf@udc.edu.ar
HUENELAF	Tamara Jeanette	35886801	tjhuenelaf@udc.edu.ar
HUENELAF	Victor Americo	41478547	vahuenelaf@udc.edu.ar
HUENTECOY	Claudia Marcela	39441255	cmhuentecoy@udc.edu.ar
HUGHES	Carola Inés	32650237	cihughes@udc.edu.ar
HUGHES	Gabriela Stefania	35099748	gshughes@udc.edu.ar
HUGHES	Giselle	37962471	ghughes@udc.edu.ar
HUGHES	Gloria Mariel	33611377	gmhughes@udc.edu.ar
HUGHES DIAZ	Dayana Analia	38711483	dahughesdiaz@udc.edu.ar
HUGHES DIAZ	Silvana Noelia	37148291	snhughes@udc.edu.ar
HUICHULEF	Hector Alexis	41475910	hahuichulef@udc.edu.ar
HUICHULEF	Roxana Isabel	29493628	rihuichulef@udc.edu.ar
HUICHULEF YEVENES	Bruno Nilo Emmanuel	37147655	bnehuichulefyevenes@udc.edu.ar
HUILINAO	Andrea Lucia	39443385	alhuilinao@udc.edu.ar
HUINCA	Amelia Nilda	36914498	anhuinca@udc.edu.ar
HUINCA	Cristina	33257486	chuinca@udc.edu.ar
HUIRCAN	Mariángeles Lourdes	40209646	mlhuircan@udc.edu.ar
HUIRCAPAN	Aylén Soledad	37666072	ashuircapan@udc.edu.ar
HUISCA	Maria Elizabeth	39897529	mehuisca@udc.edu.ar
HURTADO	Carlos Raúl Nazareno	38801233	crnhurtado@udc.edu.ar
IBARRA	Lucia Maribel	41778773	lmibarra@udc.edu.ar
IBARRA	Melina Rocio	41793479	mribarra@udc.edu.ar
IBAZETA	Luana Araceli	41683462	laibazeta@udc.edu.ar
IBAÑEZ	Facundo Isaias Daniel	40818547	fidibanez@udc.edu.ar
IBAÑEZ	Marisol Andrea	38807562	maibanez@udc.edu.ar
IBERLUCEA	Maximiliano Javier	26630434	mjiberlucea@udc.edu.ar
IGNATTI	Karina Antonia	26727159	kaignatti@udc.edu.ar
IGNATTI	Romina Francisca	26727160	rfignatti@udc.edu.ar
INALEF	Brenda Jesica Judith	38431786	bjjinalef@udc.edu.ar
IRAOLA QUIROGA	Luca	42479118	liraolaquiroga@udc.edu.ar
IRIBARRA	 Maria Eugenia	28645836	meiribarra@udc.edu.ar
IRRIBARRA	Luz Irene	37157620	liirribarra@udc.edu.ar
ISASMENDI	Pablo Marcelo	18398688	pmisasmendi@udc.edu.ar
ISHINO	Tami Daniela	37148914	tishino@udc.edu.ar
ITURRIOZ	Abigail Rocio	41475765	ariturrioz@udc.edu.ar
IVANOVICH INGRAVALLO	Sandro Norberto	29482911	snivanovichingravallo@udc.edu.ar
IZQUIERDO	Marcelo	17833087	mizquierdo@udc.edu.ar
IZQUIERDO	Mariano Alberto	23791279	maizquierdo@udc.edu.ar
JAEGER	Marcos Javier	31636565	mjjaeger@udc.edu.ar
JAJARABILLA	Nicolas Agustin	42479209	najajarabilla@udc.edu.ar
JAMES	Lucrecia Verona	35381812	lvjames@udc.edu.ar
JANCO	Micaela Lorena	41118876	mljanco@udc.edu.ar
JARA	Ariel Nicolas	41017479	anjara@udc.edu.ar
JARA	Axel Roger Alexander	40207284	arajara@udc.edu.ar
JARA	Fernanda Emilse	35381848	fejara@udc.edu.ar
JARA	Gisella Iohanna	36212632	gijara@udc.edu.ar
JARA GOICOCHEA	Nadia Nerea	39867743	nnjaragoicochea@udc.edu.ar
JARAMILLO	Franco Ezequiel	40207050	fejaramillo@udc.edu.ar
JARAMILLO	María Ana Celia	23998550	macjaramilloruminahuel@udc.edu.ar
JARAMILLO	Micaela Anahy	38864687	majaramillo@udc.edu.ar
JARAMILLO	Samanta Dahiana	40207984	sajaramillo@udc.edu.ar
JARAMILLO	Violeta Soledad	35693528	vsjaramillo@udc.edu.ar
JEFTIMOVICH	Cristina Judit	24584440	cjjeftimovich@udc.edu.ar
JENKINS	Valeria Ayelén	32489534	vajenkins@udc.edu.ar
JENSEN	Samanta Maylen	38805283	smjensen@udc.edu.ar
JIMENEZ	Herminda	40947962	hjimenez@udc.edu.ar
JIMENEZ	Luciana Melina	35887655	lmjimenez@udc.edu.ar
JINKS CORREA	Sara Oriana	37968966	sojinkscorrea@udc.edu.ar
JONES	Adriana Trinidad	40089837	atjones@udc.edu.ar
JONES	Florencia Anahi	39403925	fajones@udc.edu.ar
JONES	Lucia Fernanda	41628801	lfjones@udc.edu.ar
JONES	Santiago Damian	35886882	sdjones@udc.edu.ar
JORGE	Karen Talia	38806914	ktjorge@udc.edu.ar
JOURDAN	Tamara Maria Elizabet	41475644	tmejourdan@udc.edu.ar
JUANAS	Micaela Antu	42274869	majuanas@udc.edu.ar
JUAREZ	Exel Nicolas	37151723	enjuarez@udc.edu.ar
JUAREZ	Federico Damian	37605486	fdjuarez@udc.edu.ar
JUAREZ	Gisel Malvina	34275702	gmjuarez@udc.edu.ar
KMET	Ana Belén	38806528	abkmet@udc.edu.ar
KOBS	Maria Carolina	28390012	mckobs@udc.edu.ar
KONONCZUK	Sabrina Alejandra	39440353	sakononczuk@udc.edu.ar
KOVACS MIHAL	Evelyn Alejandra	40210264	eakovacksmihal@udc.edu.ar
KREBS	Eugenio Alejandro	32932062	eakrebs@udc.edu.ar
KRUGER DIAZ	Kevin Lothar	37550889	klkrugerdiaz@udc.edu.ar
LAFFITTE RUSCITTI	Emilio Natan	34559812	anlaffitteruscitti@udc.edu.ar
LAGOS	Mariela Alejandra	41040810	malagos@udc.edu.ar
LANUS CONTRERAS	María Magdalena	38518457	mmlanuscontreras@udc.edu.ar
LAPEGRINI ECHEGARAY	Maximiliano Luis	31636879	mllapegriniechegaray@udc.edu.ar
LARA CARRASCO	Jessica	36334578	jlaracarrasco@udc.edu.ar
LARES	Ivo Luis Alfredo	38046456	ilalares@udc.edu.ar
LARRONDO	Cristian Adrian	36212633	calarrondo@udc.edu.ar
LAUQUEN	Maira Silvana	43112987	mslauquen@udc.edu.ar
LEAL	Lara Yanina	37395232	lyleal@udc.edu.ar
LEAL	Lourdes Bahiana	41220123	lbleal@udc.edu.ar
LEDESMA	Pablo Ariel	33839619	paledesma@udc.edu.ar
LEFIMIL	David Alcides	31233650	ralefimil@udc.edu.ar
LEFIPAN	Sixto	29618175	slefipan@udc.edu.ar
LEFIÑIR	Santiago Ezequiel	41357411	selefinir@udc.edu.ar
LEGUEY	Hernan Alexis	36724674	haleguey@udc.edu.ar
LEGUIZA	Nadia Vanesa	36320588	nvleguiza@udc.edu.ar
LEIVA	Facundo Joaquin	40207179	fjleiva@udc.edu.ar
LEIVA	Gisela Beatriz	36320749	gbleiva@udc.edu.ar
LEIVA	Melina Analía	40871986	maleiva@udc.edu.ar
LEIVA	Pamela Noelia	39443600	pnleiva@udc.edu.ar
LEIVA	Yesica Romina	38807445	yrleiva@udc.edu.ar
LENIZ	Aldana Brisa	41597678	ableniz@udc.edu.ar
LEON	Matias Nicolas	41118574	mnleon@udc.edu.ar
LEON	Silvana Teresa	38804392	stleon@udc.edu.ar
LEON	Solana Florencia	39441410	sfleon@udc.edu.ar
LEROYER	Braian Leonel	38046151	bleroyer@udc.edu.ar
LESCANO	Agustin Adrian	40385190	aalescano@udc.edu.ar
LESCANO	Denis Luis Patricio	28055469	dlplescano@udc.edu.ar
LESCANO	Patricia Natalia	27698847	pnlescano@udc.edu.ar
LESCANO	Yael Tamara	38026741	ytlescano@udc.edu.ar
LESLIE	Andrea Karina	38143972	akleslie@udc.edu.ar
LEUFUMAN	Gisella Edith	37700083	geleufuman@udc.edu.ar
LEVIO	Erica Anabella	29282391	ealevio@udc.edu.ar
LEVIÑANCO	Bárbara Micaela	37899629	bmlevinanco@udc.edu.ar
LEYES	Julieta Luisina Carla	31294172	jlcleyes@udc.edu.ar
LEZCANO	Eliana Noemi	38443028	enlezcano@udc.edu.ar
LEZCANO	Stella Maris	28055317	smlezcano@udc.edu.ar
LEZCANO CASNER	Jonathan Ezequiel	39442723	jelezcanocasner@udc.edu.ar
LICAN	Jaqueline Anahí	38807276	jalican@udc.edu.ar
LICAN	Rocio Belen	41089682	rblincan@udc.edu.ar
LICANQUEO	Sebastian Cirilo	41089571	sclicanqueo@udc.edu.ar
LIEMPE	Hugo Ariel	33611375	haliempe@udc.edu.ar
LIEMPE	Maria Belen	36911637	mbliempe@udc.edu.ar
LIEMPE	Sandro David	40207176	sdliempe@udc.edu.ar
LIENQUEO	Veronica Gisel	33772130	vglinqueo@udc.edu.ar
LILLO	Miguel Ángel	37550570	malillo@udc.edu.ar
LILLO	Nicolás Germán	33345448	nglillo@udc.edu.ar
LILLO	Ramona Magdalena	26331585	rmlillo@udc.edu.ar
LINCONAO	Vanesa Lidia	35601821	vllinconao@udc.edu.ar
LINCOÑIR	Ricardo Ariel	38300169	ralinconir@udc.edu.ar
LISAZU	Horacio Ruben	35694222	hrlisazu@udc.edu.ar
LLAIPEN	Dalila Marilin	41040679	dmllaipen@udc.edu.ar
LLAMES	Selva Patricia	28870082	spllames@udc.edu.ar
LLANCAFIL	Andrea Beatriz	28682448	abllancafil@udc.edu.ar
LLANCAQUEO	Sara Noemi	37968868	snllancaqueo@udc.edu.ar
LLANQUEL	Johana Cecilia	38805677	jcllanquel@udc.edu.ar
LLANQUELEO	Ezequiel	40208096	ellanqueleo@udc.edu.ar
LLANQUILEO	Cielo Del Valle	36860104	cdvllanquileo@udc.edu.ar
LLANQUIMAN	Nadia Magali Belén	36334972	nmbllanquiman@udc.edu.ar
LLANQUINAO ROMERO	Ximena Alejandra	38518260	xallanquinaoromero@udc.edu.ar
LLOYD	Maria del Mar	27363623	mmlloyd@udc.edu.ar
LOPEZ	Andrea Agustina	40207262	aalopez@udc.edu.ar
LOPEZ	Berno Javier	38300491	bjlopez@udc.edu.ar
LOPEZ	Daiana Ayelen	42232800	dalopez@udc.edu.ar
LOPEZ	Fany Daiana	36760459	fdlopez@udc.edu.ar
LOPEZ	Jessica Liliana	31020404	jllopez@udc.edu.ar
LOPEZ	Jessica Soledad	37149123	jslopez@udc.edu.ar
LOPEZ	Juan Alberto	12788406	jalopez@udc.edu.ar
LOPEZ	Judith	35030441	jlopez@udc.edu.ar
LOPEZ	Maira Yamila	41038586	mylopez@udc.edu.ar
LOPEZ	Mirta Noemí	26448551	mnlopez@udc.edu.ar
LOPEZ	Nelson Matias	34665612	nmlopez@udc.edu.ar
LOPEZ	Noeli Soledad	47017203	nslopez@udc.edu.ar
LOPEZ	Valeria Mabel	35357300	vmlopez@udc.edu.ar
LOPEZ	Viviana Elisabet	30163210	velopez@udc.edu.ar
LOPEZ	Yazmin Nahir	40384892	ynlopez@udc.edu.ar
LOPEZ FORMIGO	Agustina	39441563	alopezformigo@udc.edu.ar
LOPEZ ORELLANA	Giovana	93609771	glopezorellana@udc.edu.ar
LORENZO	Pamela Andrea	23032150	palorenzo@udc.edu.ar
LOYOLA	Mario Javier	25082518	mjloyola@udc.edu.ar
LOYOLA	Rodrigo Emanuel	41041115	reloyola@udc.edu.ar
LOZA ENCINAS	Blanca	94339198	blozaencinas@udc.edu.ar
LUCCHETTA	Gladys Graciela	17331234	gglucchetta@udc.edu.ar
LUCERO	Julio Ariel	41525576	jalucero@udc.edu.ar
LUJAN RANGUINAO	Daniela Yamila	37860623	dylujanranguinao@udc.edu.ar
LUNA	Susana Rocio	38147694	srluna@udc.edu.ar
LUNA LOPEZ	Raul Alfredo	95449653	ralunalopez@udc.edu.ar
MACIA	Karen Mariana	33771241	kmmacia@udc.edu.ar
MACIEL	Isabel Noemi	24365925	inmaciel@udc.edu.ar
MACKENSEN	Jonathan Javier	40922519	jjmackensen@udc.edu.ar
MADROÑAL ORTEGA	Franco Emmanuel	37550798	femadronalortega@udc.edu.ar
MAIDANA	Eliana Soledad	32388040	esmaidana@udc.edu.ar
MAIER	Florencia Mailen	41475611	fmmaier@udc.edu.ar
MALATESTA  COLIBORO	Gabriela Noemi	23201760	gnmalatestacoliboro@udc.edu.ar
MALDONADO	Jessica Lucia	35385384	jlmaldonado@udc.edu.ar
MALDONADO	Yain Danilo	39897584	ydmaldonado@udc.edu.ar
MALIQUEO	Carola Aylen	41475554	camaliqueo@udc.edu.ar
MALIQUEO	Debora Marisel	37621766	dmmaliqueo@udc.edu.ar
MALIQUEO	Milagros Romina	41041400	mrmaliqueo@udc.edu.ar
MALIQUEO	Nancy Gabriela	25407875	ngmaliqueo@udc.edu.ar
MALIQUEO	Nelson	36757205	nmaliqueo@udc.edu.ar
MALIQUEO	Walter Alfredo	38807071	wamaliqueo@udc.edu.ar
MAMANI	Evelin Ruth	28792244	ermamani@udc.edu.ar
MAMANI CALANI	Samuel Daniel	40210029	sdmamanicalani@udc.edu.ar
MAMONDI	Carla Patricia	30032788	cpmamondi@udc.edu.ar
MANITTA	Isabel Emilse	41683901	iemanitta@udc.edu.ar
MANOSALVA	Marcelo Javier	39897618	mjmanosalva@udc.edu.ar
MANQUEPAN	Katherine Noelia	37550956	knmanquepan@udc.edu.ar
MANQUILLAN	Marianela Edith	39440484	memanquillan@udc.edu.ar
MANQUILLAN	Tamara Magali	40209159	tmmanquillan@udc.edu.ar
MANRIQUE	Aldana Micaela	41735227	ammanrique@udc.edu.ar
MANRIQUE	Amilcar Alejandro	41040531	aamanrique@udc.edu.ar
MANRIQUE MONTAÑO	Rocio Natali	39792548	rnmanriquemontano@udc.edu.ar
MANSILLA	Axel Matía Alejandro	40800242	amamansilla@udc.edu.ar
MANSILLA	Brenda Daniela	36177295	bdmansilla@udc.edu.ar
MANSILLA	Camila Araceli	41735481	camansilla@udc.edu.ar
MANSILLA	Claudia Carola	24302829	ccmansilla@udc.edu.ar
MANSILLA	Leonel Santiago	40384335	lsmansilla@udc.edu.ar
MANSILLA	Manuel Hernan	37550747	mhmansilla@udc.edu.ar
MANSILLA	Matilde Verónica	29419890	vmmansilla@udc.edu.ar
MANSILLA	Micaela Yanina	39929407	mymansilla@udc.edu.ar
MANSILLA	Pablo Daniel	35596761	pdmansilla@udc.edu.ar
MANSILLA	Veronica Ayelen	40207565	vamansilla@udc.edu.ar
MARCHAN	Alan Franco	38046045	afmarchan@udc.edu.ar
MARCIAL	Jazmin Cecilia	37365355	jcmarcial@udc.edu.ar
MARCIAL	Leonardo Jesus	39403945	ljmarcial@udc.edu.ar
MARCUCCIELLO	Néstor	32208599	nmarcucciello@udc.edu.ar
MARDER	Leonor Irupe	28945133	limarder@udc.edu.ar
MARDONES	Paula Vanesa	26136089	pvmardones@udc.edu.ar
MARIFIL	Claudia Elisabet	20541825	cemarifil@udc.edu.ar
MARIFIL	Nazarena Milagros	41793021	nmmarifil@udc.edu.ar
MARILAF	Yamila Micaela	39440536	ymmarilaf@udc.edu.ar
MARIMAN	Rocío Anabel	36393140	ramariman@udc.edu.ar
MARIN	Paola Alejandra	24934575	pamarin@udc.edu.ar
MARIN	Sasha Maria del Carmen	42274913	smcmarin@udc.edu.ar
MARINAO	Alexis Isaias	40207294	aimarinao@udc.edu.ar
MARINAO	Estela Maris	30811419	emmarinao@udc.edu.ar
MARINAO	Gabriela Mercedes	28516737	gmmarinao@udc.edu.ar
MARINAO	Vanesa Fabiana	40871978	vfmarinao@udc.edu.ar
MARINHO	Emilse Belen	40210497	ebmarinho@udc.edu.ar
MARIPAN	Brian Nicolás	37148456	bnmaripan@udc.edu.ar
MARIPAN	Roberta Mariana	37148037	rmmaripan@udc.edu.ar
MARON	Amira	41175298	amaron@udc.edu.ar
MARQUEZ	Abril Valentina	41597627	avmarquez@udc.edu.ar
MARQUEZ	Agostina Fernanda	41402883	afmarquez@udc.edu.ar
MARTIN	Franco David	38784586	fdmartin@udc.edu.ar
MARTIN	Hector Daniel	29618179	hdmartin@udc.edu.ar
MARTIN	José Mariano Alexis	34665626	jmamartin@udc.edu.ar
MARTINEZ	Alexandra Anabela	42408959	aamartinez@udc.edu.ar
MARTINEZ	Alfredo Gabriel	26344330	agmartinez@udc.edu.ar
MARTINEZ	Ana Belén	38535895	abmartinez@udc.edu.ar
MARTINEZ	Flavia Ioana	37962504	fimartinez@udc.edu.ar
MARTINEZ	Karina Rosana	26236611	krmartinez@udc.edu.ar
MARTINEZ	Kevin Nicolás	38805050	knmartinez1@udc.edu.ar
MARTINEZ	Magali Karen	41619080	mkmartinez@udc.edu.ar
MARTINEZ	Maria Elena	25442325	memartinez1@udc.edu.ar
MARTINEZ	Maria Liliana	42133243	mlmartinez@udc.edu.ar
MARTINEZ	Mariel Alejandra	36392781	mamartinez@udc.edu.ar
MARTINEZ	Walter Grimaldo	39443049	wgmartinez@udc.edu.ar
MARTINEZ DARROMAN	José	95217309	jmartinezdarroman@udc.edu.ar
MARTINEZ GODOY	Maria Soledad	33769346	msmartinezgodoy@udc.edu.ar
MARTINEZ MITRE	Martin Emanuel	32830403	memartinezmitre@udc.edu.ar
MARTINUK	Ailén Alejandra	42315521	aamartinuk@udc.edu.ar
MASALA	Micaela	38805203	mmasala@udc.edu.ar
MASSRI	Eliana	38232474	emassri@udc.edu.ar
MATAMALA	Martín Iván	37550999	mimatamala@udc.edu.ar
MATAMALA	Ramiro Oscar	34665384	romatamala@udc.edu.ar
MATSCHKE	David Juan Sebastián	39897555	djsmatschke@udc.edu.ar
MATTEU	Claudia Vanesa	25530486	cvmatteu@udc.edu.ar
MAVRICK	Hector Daniel	23401717	hdmavrick@udc.edu.ar
MAYORGA	Ariadna Belén	40208736	abmayorga@udc.edu.ar
MAYORGA	Juliana	37347190	jmayorga@udc.edu.ar
MEDINA	Antonella Belen	41525567	abmedina@udc.edu.ar
MEDINA	Juan Manuel	30284226	jmmedina@udc.edu.ar
MEDINA	Miguel Ángel	26893819	mamedina@udc.edu.ar
MEDINA PINEDA	Juan Luis Antonio	18888732	jlamedinapinedo@udc.edu.ar
MEISEN	Mercedes del Carmen	29581456	mdcmeisen@udc.edu.ar
MELI	Martin Ricardo	35024334	mrmeli@udc.edu.ar
MELIN	Astrid Anelen	34663506	aamelin@udc.edu.ar
MELINAO	Rodrigo Alexis	29645965	ramelinao@udc.edu.ar
MELIQUEO	Cristian Daniel	38806578	cdmeliqueo@udc.edu.ar
MELIQUEO	Magali Soledad	41722429	msmeliqueo@udc.edu.ar
MELIVILO	Juana Soraya Alejandra	38797923	jsamelivilo@udc.edu.ar
MELLA	Noelia Anahí	31978261	namella@udc.edu.ar
MELLAO	Patricio Daniel	40871869	pdmellao@udc.edu.ar
MENDEZ	Alexis Martin	37968870	ammendez@udc.edu.ar
MENDEZ	Brenda Jimena	31846070	bjmendez@udc.edu.ar
MENDOZA	Irma Angélica	32142693	iamendoza@udc.edu.ar
MENDOZA	Zunilda Concepción	22196084	zcmendoza@udc.edu.ar
MENDOZA VALENCIA	Beatriz Milagros	95387510	bmmendozavalencia@udc.edu.ar
MENECES	Claudia Noemí	25710128	cnmeneces@udc.edu.ar
MERELES	Veronica Fernanda	25232205	vfmereles@udc.edu.ar
MESA	Ayelen	40210425	amesa@udc.edu.ar
MEZA	Brenda Marian	38797940	bmmeza@udc.edu.ar
MEZA	Glenda Ayelen	40210557	gameza@udc.edu.ar
MEZA	Juan Edgardo	38232523	jemeza@udc.edu.ar
MEZA	Mariana Soledad	39204041	msmeza@udc.edu.ar
MICOLI	Abigail	40027610	amicoli@udc.edu.ar
MIGUENS	Juan Carlos	40384077	jcmiguens@udc.edu.ar
MIGURA	Marisol	40209114	mmigura@udc.edu.ar
MILE	Angie Daiana	40837840	admile@udc.edu.ar
MILE	Roxana Vanesa	41597259	rvmile@udc.edu.ar
MILIPIN	Bárbara Gladys Soledad	29983759	bgsmilipin@udc.edu.ar
MILISICH	Miguel Sebastián	27901577	msmilisich@udc.edu.ar
MILLACAL	Jonathan Daniel	38804568	jdmillacal@udc.edu.ar
MILLAFILO	Lucas David	38536069	ldmillafilo@udc.edu.ar
MILLALDEO	Gloria	34663923	gmillaldeo@udc.edu.ar
MILLALONCO	Daiana Belen	36860089	dbmillalonco@udc.edu.ar
MILLAMAN SABRE	Nazareth	38807289	nmillamansabre@udc.edu.ar
MILLANAHUEL	Jessica Vanesa	35886898	jvmillanahuel@udc.edu.ar
MILLANAHUEL	Johanna Malvina Soledad	39439753	jmsmillanahuel@udc.edu.ar
MILLANAO	Evelyn Soraya	37860731	esmillanao@udc.edu.ar
MILLANAO	Maximiliano Ignacio	41089887	mimillanao@udc.edu.ar
MILLANGUIR	Pablo Emanuel	36650672	pemillanguir@udc.edu.ar
MILLANGUIR	Pamela Alejandra	36876998	pamillanguir@udc.edu.ar
MILLANICUL	Veronica Ester	38784498	vemillanicul@udc.edu.ar
MILLAPAN	Adriana Gisel	41597391	agmillapan@udc.edu.ar
MILLAPAN	Ana Belén	41040941	abmillapan@udc.edu.ar
MILLAPI	Brenda Marlen	33775207	bmmillapi@udc.edu.ar
MILLAQUEO	José Luis	23178160	jlmillaqueo@udc.edu.ar
MILLAÑANCO	Laura	39443603	lmillananco@udc.edu.ar
MION PASSARINI	Julieta Natali	39442149	jnmionpassarini@udc.edu.ar
MIRA	Marisol Alejandra	38711909	mamira@udc.edu.ar
MIRANDA	Dalma Janet	37909471	djmiranda@udc.edu.ar
MIRANDA	Jimena Elizabeth	38147589	jemiranda@udc.edu.ar
MIRANDA	María Natalia	24163722	mnmiranda@udc.edu.ar
MIRANDA FLORES	Rilda	94605301	rmirandaflores@udc.edu.ar
MIRCEVITCH	Evelin Daiana	40384059	edmircevitch@udc.edu.ar
MIRCEVITCH	Luis Guillermo	27322469	lgmircevitch@udc.edu.ar
MOLINA	Daiana Solange	37909347	dsmolina@udc.edu.ar
MOLINA	Nicolas	38535294	nmolina@udc.edu.ar
MOLINA CORVALAN	Omar Maximiliano	35925584	ommolinacorvalan@udc.edu.ar
MONACO	Matias Eduardo	36950836	memonaco@udc.edu.ar
MONDO	Aime Soledad	37147554	asmondo@udc.edu.ar
MONDO	Fernando Lorenzo	22138398	flmondo@udc.edu.ar
MONSALVE	Ema Lorena	27407435	elmonsalve@udc.edu.ar
MONSALVO	Christian Jordan	36393059	cjmonsalvo@udc.edu.ar
MONSALVO	Maribel	39440860	mmonsalvo@udc.edu.ar
MONTAGNINI	Romina Soledad	29627464	rsmontagnini@udc.edu.ar
MONTAÑO	Belen Yessica	40210191	bymontano@udc.edu.ar
MONTECINO	Walter Fabricio	28236238	wfmontecino@udc.edu.ar
MONTECINOS	Micaela Jazmin	38805715	mjmontecinos@udc.edu.ar
MONTENEGRO	Ana Belén	30596635	abmontenegro@udc.edu.ar
MONTENEGRO	Mariano José del Milagro	33345276	mjdmmontenegro@udc.edu.ar
MONTERO	Fabricio	24794250	fmontero@udc.edu.ar
MONTERO	Federico Javier	39441135	fjmontero@udc.edu.ar
MONTERO	Gabriel Alejandro	32887748	gamontero@udc.edu.ar
MONTERO	Melisa Antonella	37147685	mamontero@udc.edu.ar
MONTERO	Yanina Gisel	36757040	ygmontero@udc.edu.ar
MONTERO GOMEZ	Victoria Barbara	32777542	vbmonterogomez@udc.edu.ar
MONTEROS	Eliseo Bernabé	32801295	ebmonteros@udc.edu.ar
MONTEROS	Elizabeth Noemi	27092490	enmonteros@udc.edu.ar
MONTEROS	Facundo Damian	42133481	fdmonteros@udc.edu.ar
MONTEROS	Rebeca Jemima	35381769	rjmonteros@udc.edu.ar
MONTES	Abigail Yanina	36324431	aymontes@udc.edu.ar
MONTES	Gisel Mariana	37253944	gmmontes@udc.edu.ar
MONTESINO	Ayelen Anahi	33287305	aamontesino@udc.edu.ar
MONTESINO	Ruben Ezequiel	33773325	remontesino@udc.edu.ar
MONTI	Fernando Raul	28055360	frmonti@udc.edu.ar
MONTIEL	Ailen Soledad	40579665	asmontiel@udc.edu.ar
MONTIEL	Edith Yanina	36860146	eymontiel@udc.edu.ar
MONTIEL	Gabriela Isabel	40383969	gimontiel@udc.edu.ar
MONTIEL	Humberto Alejandrino	14811360	hamontiel@udc.edu.ar
MONTIEL	Marisa Soledad	36587800	msmontiel@udc.edu.ar
MONTIEL	Roxana Noemí	34766616	rnmontiel@udc.edu.ar
MONTOYA	Jorge Luis	38300281	jlmontoya@udc.edu.ar
MONTOYA	Lucia Belen	39444051	lbmontoya@udc.edu.ar
MORA	Marlen Estefania Aldana	41590712	maemora@udc.edu.ar
MORA	Rocio Janet	40207376	rjmora@udc.edu.ar
MORA	Walter Horacio	24109823	whmora@udc.edu.ar
MORAGA	Marcela Silvina	25724654	msmoraga@udc.edu.ar
MORAGA	Marcia Melisa	38535658	mmmoraga@udc.edu.ar
MORALES	Agustina Ailen	40210436	aamorales@udc.edu.ar
MORALES	Andrea Soledad	32893046	asmorales@udc.edu.ar
MORALES	Clara Alejandra	41619233	camorales@udc.edu.ar
MORALES	Cristian Gabriel	38804126	cgmorales@udc.edu.ar
MORALES MELILLANCA	Joaquin Maximiliano	38536035	jmmoralesmelillanca@udc.edu.ar
MORALES OJEDA	Katherina Patricia	34665109	kpmoralesojeda@udc.edu.ar
MORALES VELASQUEZ	Melisa Fiorella	41957284	mfmoralesvelasquez@udc.edu.ar
MORAN	Brian Nicolás	40546713	bnmoran@udc.edu.ar
MOREL	Jenni Analia	34423290	jamorel@udc.edu.ar
MORENO	Anahí  Micaela	41017457	ammoreno1@udc.edu.ar
MORENO	Demian	31020452	dmoreno@udc.edu.ar
MORENO	Jessica Patricia	26337015	jpmoreno@udc.edu.ar
MORENO	Leonardo Fabian	36409507	lfmoreno@udc.edu.ar
MORLEY	Jessica Anahí	37860516	jamorley@udc.edu.ar
MOSQUERA ROJAS	Rilma	94129432	rmosquerarojas@udc.edu.ar
MOYA FLORES	Yamila Belén	38443119	ybmoyaflores@udc.edu.ar
MOYANO	Mariela Belen	23817260	mbmoyano@udc.edu.ar
MOYANO	Miguel Ángel	24669258	mamoyano@udc.edu.ar
MUDA	Franco Ezequiel	36764753	femuda@udc.edu.ar
MULLER	Facundo Matias	38803678	fmmuller@udc.edu.ar
MUNDACA CALDERON	Luciana Fernanda	38800094	lfmundacacalderon@udc.edu.ar
MURGUIONDO MANSILLA	Karla Ailén	41017026	kamurguiondomansilla@udc.edu.ar
MUÑOZ	Abigail Janet	37968895	ajmunoz@udc.edu.ar
MUÑOZ	Abigail Margit	39682385	ammunoz@udc.edu.ar
MUÑOZ	Ayelén Gabriela	37968886	agmunoz@udc.edu.ar
MUÑOZ	Carla Marianela	27455141	cmmunoz@udc.edu.ar
MUÑOZ	Delia Beatriz	17900722	dbmunoz@udc.edu.ar
MUÑOZ	Diego Emanuel	38805768	demunoz@udc.edu.ar
MUÑOZ	Estela Verónica	30550038	evmunoz@udc.edu.ar
MUÑOZ	Fanny Dora Aillén	41957419	fdamunoz@udc.edu.ar
MUÑOZ	Karen Andrea	39440488	kamunoz@udc.edu.ar
MUÑOZ	María Eva	22999025	memunoz@udc.edu.ar
MUÑOZ	Roxana Edith	25789902	remunoz@udc.edu.ar
MUÑOZ	Ruben	40384978	rmunoz1@udc.edu.ar
MÜLLER	Karen Jenifer	35888287	kjmuller@udc.edu.ar
MÜLLER	Veronica	36594915	vmuller@udc.edu.ar
NAHUEL	Marcos Ezequiel	35731045	menahuel@udc.edu.ar
NAHUELCHEO	David Andrés	38158056	danahuelcheo@udc.edu.ar
NAHUELCHEO	Patricia Eliana	32777506	penahuelcheo@udc.edu.ar
NAHUELHUEN	Valeria Paola	28055120	vpnahuelhuen@udc.edu.ar
NAHUELPAN	Jessica Yamila	42636860	jynahuelpan@udc.edu.ar
NAHUELPAN	Juliana Anabel	39442057	janahuelpan@udc.edu.ar
NAHUELPAN	Mara Daiana	40739014	mdnahuelpan@udc.edu.ar
NAHUELQUIR	Gabriel Alejandro	39443583	ganahuelquir@udc.edu.ar
NAHUELQUIR	Leocadia del Valle	39443588	ldvnahuelquir@udc.edu.ar
NAHUELTRIPAY	Olga Analia	33529280	oanahueltripay@udc.edu.ar
NAHUELTRIPAY	Silvia Noemí	27021544	snnahueltripay@udc.edu.ar
NAHUELTRU	Fátima Lorena	35383796	flnahueltru@udc.edu.ar
NAPAL	Mariana Yanina	37067440	mynapal@udc.edu.ar
NARVAEZ	Evelyn Ariana	40837830	ennarvaez@udc.edu.ar
NARVAEZ	Gladys Ester	25407938	genarvaez@udc.edu.ar
NARVAEZ	Rodrigo Gabriel	38807457	rgnarvaez@udc.edu.ar
NATAINE	Luciano Manuel	22868728	lmnataine@udc.edu.ar
NAVARRETE	Maria Adelina	11913977	manavarrete@udc.edu.ar
NAVARRO	Cristian Sebastian	34665219	csnavarro@udc.edu.ar
NAVARRO	Tamara Micaela	39442709	tmnavarro@udc.edu.ar
NEIRA	Nuria Roxana	26344646	nrneira@udc.edu.ar
NEMES	Ayelen Antonia	41117875	aanemes@udc.edu.ar
NIETO GARCIA	Natalia Paola	31985909	npnietogarcia@udc.edu.ar
NIEVA	Miguel Ángel	29983711	manieva@udc.edu.ar
NITOR	Marisa Daniela	22203196	mdnitor@udc.edu.ar
NOGUEIRA	Luis Adrián	38872175	lanogueira@udc.edu.ar
NORAMBUENA	Virginia Elizabeth	36393172	venorambuena@udc.edu.ar
NUÑEZ	Luz Macarena	39443172	lmnunez@udc.edu.ar
NUÑEZ	Norali Del Carmen	39441188	ndcnunez@udc.edu.ar
OGGERO	Victoria Paulina	39502992	vpoggero@udc.edu.ar
OJEDA	David Martín	35603973	dmojeda@udc.edu.ar
OJER	Ailen Micaela	40208067	amojer@udc.edu.ar
OJER	Corina Gisela	30720627	cgojer@udc.edu.ar
OJER	Guillermo Ezequiel	37147592	geojer@udc.edu.ar
OLENIK	Gustavo Roberto Gabriel	38046234	grgolenik@udc.edu.ar
OLIVA	Jessica Araceli	37067560	jaoliva@udc.edu.ar
OLIVARES	Evangelina Soledad	42316110	esolivares@udc.edu.ar
OLIVER	Brian Iván	35887705	bioliver@udc.edu.ar
OLIVERA	Jhaquelin Carolina	94888443	jcolivera@udc.edu.ar
OLIVERO	Alan Leonel	41267427	alolivero@udc.edu.ar
OLLARZO	Milagros Yolanda	41735186	myollarzo@udc.edu.ar
OPAZO	Elvio Alexis	32139969	eaopazo@udc.edu.ar
OPAZO	Mónica Raquel	29984290	mropazo@udc.edu.ar
OPAZOS MENENDEZ	Ayrton	39441254	aopazosmenendez@udc.edu.ar
ORELLANA COCA	Maria Belen	42970150	mborellanacoca@udc.edu.ar
ORELLANA ZEBALLOS	Mabel Jessica	38805153	mjorellanazeballos@udc.edu.ar
ORIA GARRIDO	Brenda Natalia	35889684	bnoriagarrido@udc.edu.ar
ORIHUELA	Silvina Yamila	39439877	syorihuela@udc.edu.ar
ORTEGA	Bárbara Pamela	31636923	bportega@udc.edu.ar
ORTEGA	Dana Vanina	38800973	dvortega@udc.edu.ar
ORTEGA	Karen Gisel	32538414	kgortega@udc.edu.ar
ORTEGA	Lorena Yanina	30580298	lyortega@udc.edu.ar
ORTEGA	Maria Ofelia	38626743	moortega@udc.edu.ar
ORTEGA	Paola Gisell	40208008	pgortega@udc.edu.ar
ORTEGA  ANDRADE	Rodrigo Javier	35099708	rjortegaandrade@udc.edu.ar
ORTIZ	Luis Alberto	28238006	laortiz@udc.edu.ar
ORTIZ BRUGO	Cristian Federico	38535711	cfortizbrugo@udc.edu.ar
ORTIZ YUCRA	Noemi Sara	93926496	nsortizyucra@udc.edu.ar
OSORIO	Jessica Noemi	40872745	jnosorio@udc.edu.ar
OSUNA	Rebeca Raquel	36760449	rrosuna@udc.edu.ar
OTERO	Noelia Anahi	25602055	naotero@udc.edu.ar
OVANDO GARCIA	Aida	94089982	aovandogarcia@udc.edu.ar
OVIEDO	Gabriel Isaac	32308678	gioviedo@udc.edu.ar
OVIEDO	Silvina Dolores	36604548	sdoviedo@udc.edu.ar
OÑATE	Noel Ivan	38807787	nionate@udc.edu.ar
OÑATIBIA	Dana Mirena	38147450	dmonatibia@udc.edu.ar
PACHECO	Carla Micaela	38797955	cmpacheco@udc.edu.ar
PACHECO	Irma Mabel	25470834	impacheco@udc.edu.ar
PACHECO	Marcos Noé	33773217	mnpacheco@udc.edu.ar
PACHECO	Silvina Alejandra	25049241	sapacheco@udc.edu.ar
PADILLA	Agostina	39205920	anpadilla@udc.edu.ar
PADILLA	Isaac Daniel	39441001	idpadilla@udc.edu.ar
PAILLACAN	Sandra Jaqueline	34663501	sjpaillacan@udc.edu.ar
PAILLALAF	Brenda Karina	40871832	bkpaillalaf@udc.edu.ar
PAILLALAF	Julio Marcelo	36650972	jmpaillalaf@udc.edu.ar
PAINEMI	Emanuel	39442836	epainemi@udc.edu.ar
PAINEQUEO	Luvina María	38784572	lmpainequeo@udc.edu.ar
PALACIO	Melisa Catherine	39195910	mcpalacio@udc.edu.ar
PALACIOS	Aylen Marisol	41181121	ampalacios@udc.edu.ar
PALACIOS	Jessica Lorena	29212219	jlpalacios@udc.edu.ar
PALADINO	Adriana  Melisa Janet	31625679	amjpaladino@udc.edu.ar
PALAVECINO	Francisco Manuel	31069457	fmpalavecino@udc.edu.ar
PALEO	Sonia Solange	35887197	sspaleo@udc.edu.ar
PALERMO	Normando Oscar	18270461	nopalermo@udc.edu.ar
PALLAS MAC KAY	María Eugenia	31605376	mepallasmackay@udc.edu.ar
PALLERES	Daiana Ailen	37347410	dapalleres@udc.edu.ar
PALLERES	Sandra Daniela	32650381	sdpalleres@udc.edu.ar
PALOMO	Rocio Belen	38800101	rbpalomo@udc.edu.ar
PANCZUK	María Macarena	38801356	mmpanczuk@udc.edu.ar
PANIAGUA YARHUI	Mónica	94523218	mpaniaguayarhui@udc.edu.ar
PANOZO FLORES	Cielo Magali	41793050	cmpanozoflores@udc.edu.ar
PARAVANO	Eduardo Javier	39442754	ejparavano@udc.edu.ar
PARDO	Gonzalo Emanuel	40209642	gepardo@udc.edu.ar
PARDO	Rocio Jennifer Sherilyn	42020263	rjspardo@udc.edu.ar
PAREDES	Leandro Ezequiel	34766691	leparedes@udc.edu.ar
PAREDES	Soledad Malvina	29984233	smparedes@udc.edu.ar
PAREDES MANCILLA	Cesar Orlando	38805107	coparedesmancilla@udc.edu.ar
PARIS	Rocio Vanina	40739315	rvparis@udc.edu.ar
PARRA	Amilcar Nicolás	33219030	anparra@udc.edu.ar
PASCUALICH	Juan Ernesto	31914967	jepascualich@udc.edu.ar
PATIÑO	Fabricio Marcelo	37994516	fmpatino@udc.edu.ar
PAVON	Julieta Sayi	36321123	jspavon@udc.edu.ar
PAYAL	Rocio Macarena	38443603	rmpayal@udc.edu.ar
PAZ HERRERA	Hipólito Rubén	30932077	hrpazherrera@udc.edu.ar
PEDRAZA	Vilma Valeria	35887492	vvpedraza@udc.edu.ar
PEI	Jennifer	38711324	jpei@udc.edu.ar
PELUFFO	Augusto Martin	40508243	ampeluffo@udc.edu.ar
PENCHULEF	Gabriela	32471391	gpenchulef@udc.edu.ar
PERALTA	César Guillermo	22625096	cgperalta@udc.edu.ar
PERALTA	María Eva	40208179	meperalta@udc.edu.ar
PERALTA	Ximena Alejandra	36757424	xaperalta@udc.edu.ar
PERDOMO	Pedro Alberto	17130571	paperdomo@udc.edu.ar
PEREA	Graciela Alejandra	36052595	gaperea@udc.edu.ar
PEREYRA	Leandro Luciano	42133494	llpereyra@udc.edu.ar
PEREYRA	Luisa Inés	37395227	lipereyra@udc.edu.ar
PEREYRA	Orlando Anselmo	39897540	oapereyra@udc.edu.ar
PEREZ	Barbara Jordana	37395066	bjperez@udc.edu.ar
PEREZ	Mariela Solange	37147868	msperez@udc.edu.ar
PEREZ	Mónica Patricia	18908171	mpperez@udc.edu.ar
PEREZ	Nicolás Gonzalo	38518226	ngperez@udc.edu.ar
PEREZ	Valeria Andrea	29212179	vaperez2@udc.edu.ar
PEREZ	Vanina Alejandra	41525580	vaperez1@udc.edu.ar
PEREZ BARRIA	Ramiro Martin	36650586	rmperezbarria@udc.edu.ar
PETTINARI	Brenda Susana	34663851	bspettinari@udc.edu.ar
PEÑA	Federico Nahuel	38799551	fnpena@udc.edu.ar
PEÑA	Maria Gabriela	35030500	mgpena@udc.edu.ar
PEÑA	Maria Virginia	29047841	mvpena@udc.edu.ar
PFEIFFER	Norberto Osvaldo	26394063	nopfeiffer@udc.edu.ar
PICHIMILLA	Maite Rocio	40207501	mrpichimilla@udc.edu.ar
PIL	Erika Valeria	42316027	evpil@udc.edu.ar
PILLOFF	Yesica Micaela	33784108	ympilloff@udc.edu.ar
PINCHULEF	Facundo Nicolas	38784783	fnpinchulef@udc.edu.ar
PINEAU	Aylen	40210173	apineau@udc.edu.ar
PINEDA	Enzo Ariel	40871896	eapineda@udc.edu.ar
PIRES	Adrian Cesar Manuel	39442802	acmpires@udc.edu.ar
PLAZA	Jorge Gabriel	41267068	jgplaza@udc.edu.ar
POBLETE	Barbara Debora	40210335	bdpoblete@udc.edu.ar
POBLETE MANRIQUEZ	Natalia Evangelina	34663843	nepobletemanriquez@udc.edu.ar
PONCE	Ana Laura	40210052	alponce@udc.edu.ar
PONCE OTAROLA	Karina Evelin	37676902	keponceotarola@udc.edu.ar
PORCEL	Marcos Ciriaco	40384694	mcporcel@udc.edu.ar
PORQUERAS HERNANDEZ	Karen Anahi	38801323	kaporquerashernandez@udc.edu.ar
PORRAS	Eduardo Nicolas	31923481	enporras@udc.edu.ar
PORRAS	Hilda Esther	33392574	heporras@udc.edu.ar
PORRAS	Maximiliano Gabriel	36757167	mgporras@udc.edu.ar
PORTERO	Carla Luciana	39602920	clportero@udc.edu.ar
PORTILLO	Laura Noemi	24449398	lnportillo@udc.edu.ar
PRANE	Enzo Fernando	42068517	efprane@udc.edu.ar
PRIETO	Martin Jose	41220283	mjprieto@udc.edu.ar
PRIETO CASTRO	Erick Emanuel	40210332	emprietocastro@udc.edu.ar
PRITCHARD	Héctor Ariel	40207567	hapritchard@udc.edu.ar
PROBOSTE	Natalia Micaela	37347886	nmproboste@udc.edu.ar
PUCHO MOLLO	Aldo Alvaro	41030542	aapuchomollo@udc.edu.ar
PUERTA	Pablo Fernando	17820005	pfpuerta@udc.edu.ar
PUGH	Fernanda Valeria	29066641	fvpugh@udc.edu.ar
PUGH	Wanda	32334256	wpugh@udc.edu.ar
QUAGLIA	Gerardo Martin	38535371	mgquaglia@udc.edu.ar
QUENTREQUEO	Rocio Belen	37676939	rbquentrequeo@udc.edu.ar
QUESADA	Florencia Candelaria	38805292	fcquesada@udc.edu.ar
QUEVEDO	Sara Antonella	38300138	saquevedo@udc.edu.ar
QUIJON	Rosa Delia	18672412	rdquijon@udc.edu.ar
QUILAQUEO	Victor Hugo	38803894	vhquiloqueo@udc.edu.ar
QUILAQUEO	Yamila Florencia	40871976	yfquilaqueo@udc.edu.ar
QUILODRAN	Alexi Agustin	41475944	aaquilodran@udc.edu.ar
QUILODRAN	Analia Belen	35059726	abquilodran@udc.edu.ar
QUINTANA	Gustavo David	39440694	gdquintana@udc.edu.ar
QUINTANA	Mónica Ayelén	35693827	maquintana@udc.edu.ar
QUINTERO	Soledad Cecilia del Valle	32801596	scdvquintero@udc.edu.ar
QUINTEROS	Laura Daniela	31611330	ldquinteros@udc.edu.ar
QUINTRAMAN	Doris Delma Isabel	23927955	ddiquintraman@udc.edu.ar
QUINTULIPE	Alexis Leandro	40383361	alquintulipe@udc.edu.ar
QUIROGA	Denis Alexis	36650948	daquiroga@udc.edu.ar
QUIROGA	Diego Orlando	27752498	doquiroga@udc.edu.ar
QUIROGA	Félix Guillermo	21974602	fgquiroga@udc.edu.ar
QUIROGA	Isaias Silvano Noe	38626744	isnquiroga@udc.edu.ar
QUIROGA	Leonardo Omar	24165869	loquiroga@udc.edu.ar
QUIROGA	Lucas Rafael	34069509	lrquiroga@udc.edu.ar
QUIROGA	Miguel Ángel	28867614	maquiroga@udc.edu.ar
QUISPE	Tamara Elizabeth	38442727	tequispe@udc.edu.ar
QUIÑENAO	Karla Jael	40207541	kjquinenao@udc.edu.ar
RAFFA	Agostina Belen	42408095	abraffa@udc.edu.ar
RAIN	Veronica Ines	36757023	virain@udc.edu.ar
RAMIREZ	Bianca Anabella	33792895	baramirez@udc.edu.ar
RAMIREZ	María Alejandra	25975313	maramirez@udc.edu.ar
RAMIREZ	Olga Alejandra	28054754	oaramirez@udc.edu.ar
RAMIREZ	Paula Ayelen	39443111	paramirez@udc.edu.ar
RAMIREZ GUERRA	Nelson Maximiliano	32628421	nmramirezguerra@udc.edu.ar
RAMIREZ GUERRA	Sebastian Orlando	35387701	soramirezguerra@udc.edu.ar
RAMOA	Francisco  Ariel	41040711	faramoa@udc.edu.ar
RAMON	Victor Andres	20607548	varamon@udc.edu.ar
RAPIMAN	Lucila Marianella	42636559	lmrapiman@udc.edu.ar
RAPIMAN	Rocío Angela	38443557	rarapiman@udc.edu.ar
RAQUIL	Romina Beatriz	38805250	rbraquil@udc.edu.ar
RASPINI LARA	Mónica Antonella	40384455	maraspinilara@udc.edu.ar
RAYLEF CANARIO	Evelina Nadia	27841388	enraylefcanario@udc.edu.ar
REBASTI BRIA	Santiago Gabriel	41793390	sgrebastibria@udc.edu.ar
REBORA	Yanina Maria	31567212	ymrebora@udc.edu.ar
REDONDO	Ian Ariel	40922695	iaredondo@udc.edu.ar
REDONDO	Roni Axel	37550758	raredondo@udc.edu.ar
REINAHUEL	Alan Nicolas	34726872	anreinahuel@udc.edu.ar
REINER	Laura Mabel	14748525	lmreiner@udc.edu.ar
REINOSO	Federico Ivan	41041291	fireinoso@udc.edu.ar
REINOSO RAMIREZ	Ester Edith	20859181	eereinosoramirez@udc.edu.ar
REJALA	Miriam Lorena	31645577	mlrejala@udc.edu.ar
REMEIKIS	Maira Alejandra	37677026	maremeikis@udc.edu.ar
RETAMAL	Camila Agostina	39443109	caretamal@udc.edu.ar
RETAMAL	Victor Leonel	36334643	vlretamal@udc.edu.ar
REUQUE	Vanesa Yanina	33261241	vyreuque@udc.edu.ar
REVELLINO	Agostina Aldana	35447443	aarevellino@udc.edu.ar
REYERO	Adriana Del Valle	317733096	advreyero@udc.edu.ar
REYES	Milena Venisú	37151703	mvreyes@udc.edu.ar
RIAN	Celena Melisa	41722277	cmrian@udc.edu.ar
RIBES	Claudia Andrea	28683635	caribes@udc.edu.ar
RIFFO	Nahuel Eduardo	40207204	neriffo@udc.edu.ar
RINALDI	Florencia	34233374	frinaldi@udc.edu.ar
RINQUE	Angela Karina	33347025	akrinque@udc.edu.ar
RIOS	Marco Antonio	29416699	marios@udc.edu.ar
RIOS	Maria Alumine	42274491	marios1@udc.edu.ar
RIOS	Marisa Susana	23514945	msrios@udc.edu.ar
RIOS	Nestor Orlando Javier	24852716	nojrios@udc.edu.ar
RIOS	Yolanda Giovana	33774051	ygrios@udc.edu.ar
RIOS SANTA MARIA	Cindy Berenise	41198486	cbriossantamaria@udc.edu.ar
RIQUELME	Gabriela Analia	35381777	gariquelme@udc.edu.ar
RIQUELME	Ángela Florencia	36757324	afriquelme@udc.edu.ar
RIVERA	Nidia Yanet	38797857	nyrivera@udc.edu.ar
RIVERA  AGUILAR	Karam Alejandro	95331489	kariveraaguilar@udc.edu.ar
RIVERO	Daniela Veronica	31774516	dvrivero@udc.edu.ar
ROA	Romina Vanesa	26344481	rvroa@udc.edu.ar
ROBERTS	Jenifer del Carmen Ffest	40384289	jdcfroberts@udc.edu.ar
ROBERTS	Veronica Patricia	23065166	vproberts@udc.edu.ar
ROBERTS	Wanda Elizabeth	38805956	weroberts@udc.edu.ar
ROBLEDO SORIANI	Anabela Mabel	38805147	amrobledosoriani@udc.edu.ar
ROCA	Andres Agustin	29435617	aaroca@udc.edu.ar
ROCHA	Antonella Luciana	41628922	alrocha@udc.edu.ar
ROCHA	Johanna Mirela	35226375	jmrocha@udc.edu.ar
RODA TRIFUNOVICH	Paola Elizabeth	26249369	perodatrifunovich@udc.edu.ar
RODRIGUEZ	Alicia Beatriz	30088612	abrodriguez@udc.edu.ar
RODRIGUEZ	Cristian Alberto	25235149	carodriguez@udc.edu.ar
RODRIGUEZ	Daniela Patricia	38853519	dprodriguez@udc.edu.ar
RODRIGUEZ	Gaston Alexis	37395451	garodriguez@udc.edu.ar
RODRIGUEZ	Hugo Daniel	31320457	hdrodriguez@udc.edu.ar
RODRIGUEZ	Julia Laura	32650333	jlrodriguez@udc.edu.ar
RODRIGUEZ	Julieta Andrea	36732076	jarodriguez@udc.edu.ar
RODRIGUEZ	Marcos Fabian	42020139	mfrodriguez@udc.edu.ar
RODRIGUEZ	Melina Ailin	39441082	marodriguez@udc.edu.ar
RODRIGUEZ	Oscar Patricio	32568692	oprodriguez@udc.edu.ar
RODRIGUEZ	Silvio Federico	38803085	sfrodriguez@udc.edu.ar
RODRIGUEZ	Sonia Liliana	36321013	slrodriguez@udc.edu.ar
RODRIGUEZ	Yamila Andrea	38784635	yarodriguez@udc.edu.ar
RODRIGUEZ MONTAÑO	Magaly	94081633	mrodriguezmontano@udc.edu.ar
RODRIGUEZ MORENO	Emilia	38442681	erodriguezmoreno@udc.edu.ar
ROGERS	Fatima Ayelen	40384162	farogers@udc.edu.ar
ROJAS	Alejandra Soledad	32716610	asrojas@udc.edu.ar
ROJAS	Fernanda Javiera	39440485	fjrojas@udc.edu.ar
ROJAS	Gloria Mabel	27971557	gmrojas@udc.edu.ar
ROJAS	Juan Oscar	31439257	jorojas@udc.edu.ar
ROJAS	Luciana Claudia	33236112	lcrojas@udc.edu.ar
ROJAS FLORES	Alan Dario	41173780	adrojasflores@udc.edu.ar
ROJAS LAIME	Miguelina	94592696	mrojaslaime@udc.edu.ar
ROJO	Santiago José	36027208	sjrojo@udc.edu.ar
ROLDAN	Mayra Agustina	41041147	maroldan@udc.edu.ar
ROLDÁN	Facundo Nahuel	40818470	fnroldan@udc.edu.ar
ROMAN	Guadalupe Cecilia	30976110	gcroman@udc.edu.ar
ROMAN	Naomi	39391968	nroman@udc.edu.ar
ROMANESSI	Antonella	41237945	aromanessi@udc.edu.ar
ROMANESSI	Maria Florencia	37071580	mfromanessi@udc.edu.ar
ROMENO	Pedro Exequiel	42031195	peromeno@udc.edu.ar
ROMERO	Carina	31636506	cromero@udc.edu.ar
ROMERO	Ernesto Dante	17184498	edromero@udc.edu.ar
ROMERO	Franco Esequiel	40739182	feromero@udc.edu.ar
ROMERO	Jesica Ivonne	33441458	jiromero@udc.edu.ar
ROMERO	Melina Agustina	41793063	maromero@udc.edu.ar
ROMERO	Natalia Veronica	41219379	nvromero@udc.edu.ar
ROSALES	Lucia Marlen	42208803	lmrosales@udc.edu.ar
ROSAS	Alan Ciro	41793016	acrosas@udc.edu.ar
ROSAS	Romina Julieta	35693468	rjrosas@udc.edu.ar
ROSAS	Tamara Yoana	39204035	tyrosas@udc.edu.ar
ROTONDO	Thalia Belén	38442836	tbrotondo@udc.edu.ar
ROVIRA SCHIAVO	Valeria Giselle	95591244	vgroviraschiavo@udc.edu.ar
ROYON	Rodrigo Emiliano	29128132	reroyon@udc.edu.ar
ROZADA	Romina Jennifer Valeria	27028944	rjvrozada@udc.edu.ar
RUARTE	Daniela	22984403	daruarte@udc.edu.ar
RUBILAR	Oriana Camila	42408032	ocrubilar@udc.edu.ar
RUBILAR	Valeria Bettiana	34488697	vbrubilar@udc.edu.ar
RUBINICH QUEUPAN	Iván Santiago	36757127	isrubinichqueupan@udc.edu.ar
RUEDA	Sebastian Roberto	40665494	srrueda@udc.edu.ar
RUIGOMEZ	Eduardo Andrés	17802620	earuigomez@udc.edu.ar
RUIZ	Francisco Nahuel	41957181	fnruiz@udc.edu.ar
RUIZ	Jessica Vanesa	27009496	jvruiz@udc.edu.ar
RUIZ	Marcos Ezequiel	37150592	meruiz@udc.edu.ar
RUIZ	Natalia Alejandra	34765510	naruiz@udc.edu.ar
RUIZ	Neriz Carina	22686055	ncruiz@udc.edu.ar
RUIZ	Noelia Eliana	26857322	neruiz@udc.edu.ar
RUIZ	Wanda Daiana	40125963	wdruiz@udc.edu.ar
RUIZ DIAZ	Brenda	38300250	bruizdiaz@udc.edu.ar
RUIZ DIAZ	Luciano Damian	41041265	ldruizdiaz@udc.edu.ar
RULOFF	Erik Manuel	38784326	emruloff@udc.edu.ar
RUMINAHUEL	Andrea Carina	28482515	acruminahuel@udc.edu.ar
RUMINAHUEL	Jonathan	40207765	jruminahuel@udc.edu.ar
RUMINAHUEL	Vanesa Elizabeth	34663646	veruminahuel@udc.edu.ar
RUPAYAN	Liliana Beatriz	22091140	lbrupayan@udc.edu.ar
RUPAYAN	Verónica Laura	28236272	vlrupayan@udc.edu.ar
SAAVEDRA	Daniela Romina	35888574	drsaavedra@udc.edu.ar
SAAVEDRA	Fatima Yanet	37347493	fysaavedra@udc.edu.ar
SAAVEDRA	Lucas Eduardo	38807454	lesaavedra@udc.edu.ar
SABALZA	Claudia Soledad	32219908	cssabalza@udc.edu.ar
SACCO	Jazmin Araceli	38442833	jasacco@udc.edu.ar
SAEZ	Ivana Valeria	29114943	ivsaez@udc.edu.ar
SAEZ	Rocio Belen	40922673	rbsaez@udc.edu.ar
SAIFF	Paola Vanesa	27647233	pvsaiff@udc.edu.ar
SAIS CANIO	Amira  Lucia	35171653	alsaiscanio@udc.edu.ar
SALAMANCA	Natalia Belén	41525531	nbsalamanca@udc.edu.ar
SALARI	Facundo Iván	39441614	fisalari@udc.edu.ar
SALAZAR	Cristian Melchor	36757030	cmsalazar@udc.edu.ar
SALDIVIA	Josefa Guadalupe	39443464	jgsaldivia@udc.edu.ar
SALDIVIA	María Ofelia	40207759	mosaldivia@udc.edu.ar
SALDIVIA  ALVAREZ	Rodrigo Eduardo	40208088	resaldiviaalvarez@udc.edu.ar
SALDIVIA GONZALEZ	Augusto Berlarmino	92464222	absaldiviagonzalez@udc.edu.ar
SALINAS	Brenda Erika	41041417	besalinas@udc.edu.ar
SALINAS	Cindy Evelin	39440035	cesalinas@udc.edu.ar
SALINAS	Geraldin	42020265	gsalinas@udc.edu.ar
SAMPINI	Gonzalo Agustin	35357187	gasampini@udc.edu.ar
SAN MARTIN	Anahi Lorena	38535778	alsanmartin@udc.edu.ar
SAN MARTIN	Graciela del Carmen	32650252	gdcsanmartin@udc.edu.ar
SANCHES FLORES	David Michel	38802907	dmsanchezflores@udc.edu.ar
SANCHEZ	Alicia Natalia	31021276	ansanchez@udc.edu.ar
SANCHEZ	Ezequiel Alberto	36392904	esanchez@udc.edu.ar
SANCHEZ	Gabriela Verónica	32274327	gvsanchez@udc.edu.ar
SANCHEZ	Gonzalo Tomas	41041225	gtsanchez@udc.edu.ar
SANCHEZ	Guadalupe Ester	20589654	gesanchez@udc.edu.ar
SANCHEZ	Lucía Anahí	39443417	lasanchez@udc.edu.ar
SANCHEZ	Mariana	32264390	msanchez@udc.edu.ar
SANCHEZ	Sonia Marlene	25656660	smsanchez@udc.edu.ar
SANCHEZ	Valeria Alicia	33774169	vasanchez@udc.edu.ar
SANCHEZ GOMEZ	Brian Adrian	38807098	basanchezgomez@udc.edu.ar
SANCHEZ PELLIZA	Lourdes Andrea	34188847	lasanchezpelliza@udc.edu.ar
SANCHEZ URBINA	Andrea Vanesa	28689881	avsanchezurbina@udc.edu.ar
SANDOVAL	Eduardo Damián Andres	38807241	edasandoval@udc.edu.ar
SANDOVAL	Sandra Verónica	26344327	svsandoval@udc.edu.ar
SANDOVAL SANDOVAL	Nestor Fabian	32220366	nfsandovalsandoval@udc.edu.ar
SANHUEZA	Magali	38803818	msanhueza@udc.edu.ar
SANHUEZA CASTILLO	Silvia Jaqueline	35887782	sjsanhuezacastillo@udc.edu.ar
SANTANA BUSTELO	Maximiliano Exequiel	37741595	mesantanabustelo@udc.edu.ar
SANTANDER	Adriana Noemi	39203969	ansantander@udc.edu.ar
SANTANDER	Laura Anahi	33946606	lasantander@udc.edu.ar
SANTIAGO	Jorge Ruben	4438136	jrsantiago@udc.edu.ar
SANTIAGO	Nicolás Gabino	29205766	ngsantiago@udc.edu.ar
SANTILLAN	Erika Mayra	34665005	emsantillan@udc.edu.ar
SANTILLAN	Federico Emmanuel	34750567	fesantillan@udc.edu.ar
SANTIVANO	Mariela	22010000	msantivano@udc.edu.ar
SANTOS VALENCIA	Yazmin Lorena	42208842	ylsantosvalencia@udc.edu.ar
SAPIA	Luis Francisco	34233930	lfsapia@udc.edu.ar
SARMIENTO	Belén Muriel	39438235	bmsarmiento@udc.edu.ar
SCARTON	Cristian Ezequiel	37550506	cescarton@udc.edu.ar
SCHENONE	Brenda Emilce	39442232	beschenone@udc.edu.ar
SCHMIDT	Analía Verónica	27841127	avschmidt@udc.edu.ar
SCHMIDT	Iber Yamil	40838128	iyschmidt@udc.edu.ar
SEGUEL	Gisel  Andrea	34665303	gaseguel@udc.edu.ar
SEGUEL	Maria Florencia	37147526	mfseguel@udc.edu.ar
SEGUNDO	Malvina Soledad	40385724	mssegundo@udc.edu.ar
SEGUNDO	Silvina Belén	36320652	sbsegundo@udc.edu.ar
SEJAS	Monica Patricia	30041656	mpsejas@udc.edu.ar
SELG	Angela Ivana	35887732	aiselg@udc.edu.ar
SELVA  ANDRADE	Vanesa Paola	23065268	vpselvaandrade@udc.edu.ar
SEPULVEDA	Erica Ayelen	38784402	easepulveda@udc.edu.ar
SEPULVEDA	Marisa Fernanda	33921605	mfsepulveda@udc.edu.ar
SEPULVEDA	Nadia Romina	31914742	nrsepulveda@udc.edu.ar
SEPULVEDA	Silvia Marianela	37151501	smsepulveda@udc.edu.ar
SEPULVEDA  ABURTO	Samuel Alejandro	33771228	sasepulveda@udc.edu.ar
SEPULVEDA ANDREOLI	Lucia Gabriela	40825450	lgsepulvedaandreoli@udc.edu.ar
SEQUEIRA	Mario Eduardo	37148980	mesequeira@udc.edu.ar
SEQUEIRA	Nicolas Mario	38883303	nmsequeira@udc.edu.ar
SERDA	María Inés	25582761	miserda@udc.edu.ar
SERON	María Elena	21355220	meseron@udc.edu.ar
SERRANO	Claudio Fernando	29260303	cfserrano@udc.edu.ar
SERRANO MENDOZA	Vania	94587253	vserranomendoza@udc.edu.ar
SILGUERO	Georgina	30036102	gsilguero@udc.edu.ar
SILVA	Derly Julián	38801689	djsilva@udc.edu.ar
SILVA	Franco Ivan	40800224	fisilva@udc.edu.ar
SILVA	Juan Carlos	37757373	jcsilva@udc.edu.ar
SILVA	Lorena Belen	30724133	lbsilva@udc.edu.ar
SILVA	Lorena Leticia	25076678	llsilva@udc.edu.ar
SILVA	Yesica Yamila	36495931	yysilva@udc.edu.ar
SILVA BELCARO	Carla Desireé	33771173	cdsilvabelcaro@udc.edu.ar
SILVA FERREYRA	Alejandra Jeannette	37860617	ajsilvaferreyra@udc.edu.ar
SILVA SOTO	Brian Leonardo	36393048	blsilvasoto@udc.edu.ar
SILVA VEGA	Tamara Denise	40837989	tdsilvavega@udc.edu.ar
SIMEONI	Ezequiel Oscar	35271138	eosimeoni@udc.edu.ar
SIMEONI	Sandro Ezequiel	37480202	sesimeoni@udc.edu.ar
SIMON CALVO	Silvina Gabriela	39439916	sgsimoncalvo@udc.edu.ar
SIRES	Aldana Estefania	39097291	aesires@udc.edu.ar
SIRI	Jose Luis	34765880	jlsiri@udc.edu.ar
SOLIS	Agustin	37069012	asolis@udc.edu.ar
SOLIS	Judith Anabel	33849269	jasolis@udc.edu.ar
SOLIS	Maria Isabel	25335812	misolis@udc.edu.ar
SOLIS	Milton José	40207074	mjsolis@udc.edu.ar
SORIA	Ivana Daniela	41118609	idsoria@udc.edu.ar
SORUCO RODRIGUEZ	Elvio Elvis	94345247	eesorucorodriguez@udc.edu.ar
SOSA VALDEBENITO	Ayelen Danixa	40210000	adsosavaldebenito@udc.edu.ar
SOTO	Ingrid Pilar	41089528	ipsoto@udc.edu.ar
SOTO	Jessica Noemi	37151628	jnsoto@udc.edu.ar
SOTO	Walter Guillermo	41267047	wgsoto@udc.edu.ar
SOTO CARRASCO	Tisiana Gisel	40872074	tgsotocarrasco@udc.edu.ar
SOTO VAZQUEZ	Marlen Leslie	38046331	mlsotovazquez@udc.edu.ar
SOTTO	Brenda Claribel	35693634	bcsotto@udc.edu.ar
SOUTO	Marisa del Carmen	20238518	mdcsouto@udc.edu.ar
SOUTO	Marisa del Carmen	20238518	mdlcsouto@udc.edu.ar
STEPEZYNSKI	Enzo Miguel	41793983	emstepezynski@udc.edu.ar
STORTINI	Gonzalo Damian	38806183	gdstortini@udc.edu.ar
SUAREZ	Mariana Beatrice	40872030	mbsuarez@udc.edu.ar
SUAREZ	Pablo Federico	39440459	pfsuarez@udc.edu.ar
SUAREZ SAN MARTIN	Yaneth Del Carmen	37749435	ydcsuarezsanmartin@udc.edu.ar
SUAREZ SILVA	Nicolás Paul	33769215	npsuarezsilva@udc.edu.ar
TABORDA	Hermes Luciano	33059024	hltaborda@udc.edu.ar
TAMARGO	Ricardo José	39440632	rjtamargo@udc.edu.ar
TAPIA LIMACHE	Sonia Soledad	34957808	sstapialimache@udc.edu.ar
TARDON	Candela Belén	35887284	cbtardon@udc.edu.ar
TAUX	Anahí Gabriela	36320540	agtaux@udc.edu.ar
TAUX	Marta Maite Judith	37151604	mmjtaux@udc.edu.ar
TAVELLA	Brenda Maricruz	37151664	bmtavella@udc.edu.ar
TENEB	Tamara Ayelen	40209010	tbteneb@udc.edu.ar
TENORIO	Natalia Noemi	28708019	nntenorio@udc.edu.ar
TIMMERMANN	Carola Viviana	40208099	cvtimmermann@udc.edu.ar
TINTAYA CANO	Cesia Eunice	42479903	cetintayacano@udc.edu.ar
TOLEDO	Ivana Antonella	38046173	iatoledo@udc.edu.ar
TOLEDO	Luis Alberto	40206995	latoledo@udc.edu.ar
TONI FRASSER	Ornela Zaara Janet	40384600	ozjtonifrasser@udc.edu.ar
TORO	Carlos Emanuel	37147909	cetoro@udc.edu.ar
TORO	Iván Jonathan Emanuel	35887090	ijetoro@udc.edu.ar
TORO SOTO	Evelin Adriana	37147574	eatorosoto@udc.edu.ar
TORRES	Albino	33222317	atorres@udc.edu.ar
TORRES	Aldana Abigail	41013362	aatorres@udc.edu.ar
TORRES	Belen	41597300	btorres@udc.edu.ar
TORRES	Diego Rafael	30570978	drtorres@udc.edu.ar
TORRES	Luis Angel	25625558	latorres@udc.edu.ar
TORRES	Micaela Natalia	37395319	mntorres@udc.edu.ar
TORRES	Miguel Ángel	11402936	matorres@udc.edu.ar
TORRES	Romanella	34051327	rtorres@udc.edu.ar
TORRES ECHAVES	Candela Jazmin	42133252	cjtorresechaves@udc.edu.ar
TORRIELLI	Miguel Ángel	29367262	matorrielli@udc.edu.ar
TOTARO	Shirley Elizabeth	37148047	setotaro@udc.edu.ar
TRAFIPAN	Agustina Marisol	39443079	amtrafipan@udc.edu.ar
TRAIPE	Ailen Micaela	40739155	amtraipe@udc.edu.ar
TRANGOL	Daiana Daniela	37700203	ddtrangol@udc.edu.ar
TRECAMAN	Florencia Edith	39441931	fetrecaman@udc.edu.ar
TREUMANN	Alicia Celeste	28605617	actreumann@udc.edu.ar
TREUQUIL	Carolina Daniela	31672804	cdtreuquil@udc.edu.ar
TRINA	Nancy Emilse	38784689	netrina@udc.edu.ar
TRIPAILAO	Tamara Vanesa	32720106	tvtripailao@udc.edu.ar
TRONCOSO	Huilqui Anselmo	39203919	hatroncoso@udc.edu.ar
TRONCOSO	Jennifer Etienne	36860120	jetroncoso@udc.edu.ar
TRONCOSO	Rodrigo Nicolás	37348299	rntroncoso@udc.edu.ar
TRONCUTO	Monica Patricia	27975115	mptroncuto@udc.edu.ar
TURANZAS	Adriana Soledad	36650731	asturanzas@udc.edu.ar
TUREO	Yolanda Ester	24513632	yetureo@udc.edu.ar
UGARNES	Agustín Leonel	38442334	alugarnes@udc.edu.ar
ULIAMBRE	Natalia Aluminé	36652171	nauliambre@udc.edu.ar
ULLOGA	Betina Anahi	41722365	baulloga@udc.edu.ar
ULLOGA	Jessica Yanina	36860150	jyulloa@udc.edu.ar
URIBE NEUMANN	Maria Elena	18905712	meuribeneumann@udc.edu.ar
URREA	Andrea Paola	36322350	apurrea@udc.edu.ar
URRUTIA	Angela Daiana	40384171	adurrutia@udc.edu.ar
URRUTIA GALDAMEZ	Adriana Marisol	36322344	amurrutiagaldamez@udc.edu.ar
URTIZBEREA	Daniela Carina	34784329	dcurtizberea@udc.edu.ar
URZAGASTE	Graciela Soledad	28958063	gsurzagaste@udc.edu.ar
USQUEDA	Janet Andrea	41267242	jausqueda@udc.edu.ar
UTRERA	Gabriela Anabel	38800381	gautrera@udc.edu.ar
UTRERA	Matías Ezequiel	40208500	meutrera@udc.edu.ar
VALDEBENITO	Fernando Martin	36650929	fmvaldebenito@udc.edu.ar
VALDEBENITO	Gonzalo	38046191	gvaldebenito@udc.edu.ar
VALDES	Carla Florencia	38784431	cfvaldes@udc.edu.ar
VALDEZ	Sandra Patricia	31495734	spvaldez@udc.edu.ar
VALDIVIEZO	Carolina Susana	27220760	csvaldiviezo@udc.edu.ar
VALENCIA	Adriana Ayelén	38803984	aavalencia@udc.edu.ar
VALENZUELA	Karen Andrea	37860724	kavalenzuela@udc.edu.ar
VALENZUELA	Natalia Daiana	38801222	ndvalenzuela@udc.edu.ar
VALLE	Micaela Soledad	39713744	msvalle@udc.edu.ar
VALLEJOS	Héctor Alexis	37067657	haavallejos@udc.edu.ar
VALLEJOS	Manuel Jesús	37677077	mjvallejos@udc.edu.ar
VALLEJOS MAURO	Maira Lorena	34663805	mlvallejosmauro@udc.edu.ar
VAN VLIET	Ariel Maximiliano	37665187	amvanvliet@udc.edu.ar
VARELA	Cristian Eduardo	36334971	cevarela@udc.edu.ar
VARGAS	Andrea Beatriz	36860375	abvargas@udc.edu.ar
VARGAS	Betiana Analia	39203917	bavargas@udc.edu.ar
VARGAS	Karen Micaela	39440037	kmvargas@udc.edu.ar
VARGAS	Maria de los Angeles	36672231	mdla_vargas@udc.edu.ar
VARGAS	Teresita del Carmen	30976510	tdcvargas@udc.edu.ar
VARGAS SOTO	Aaron Abiu	19010247	aavargassoto@udc.edu.ar
VAUGHAN	Guillermo	23065136	gvaughan@udc.edu.ar
VAZQUEZ	Abigail	41118671	avazquez@udc.edu.ar
VAZQUEZ	Andrea Belen	41722306	abvazquez@udc.edu.ar
VAZQUEZ	Natalia Elisabet	31136086	nevazquez@udc.edu.ar
VAZQUEZ	Natalia Elizabeth	42771823	nevazquez@udc.edu.ar
VAZQUEZ	Tomás Alfredo	40385142	tavazquez@udc.edu.ar
VAZQUEZ	Yamila Pamela	36876910	ypvazquez@udc.edu.ar
VAZQUEZ OTERO	Sofía Nicole	38804662	snvazquezotero@udc.edu.ar
VEDIA GAMBOA	Ana Macarena	37700359	amvediagamboa@udc.edu.ar
VEGA	Rocio Gabriela	34721073	rgvega@udc.edu.ar
VELARDE	Ricardo Gabriel	35887304	rgvelarde@udc.edu.ar
VELASQUE	Gabriel Omar	40207353	govelasque@udc.edu.ar
VELASQUEZ	Romina Anahi	31069424	ravelasquez@udc.edu.ar
VELASTIN GUTIERREZ	Ivo Antonio	34275905	iavelastingutierrez@udc.edu.ar
VELAZQUEZ	Joaquin Gabriel	42068839	jgvelazquez@udc.edu.ar
VELAZQUEZ	Maria de los Angeles Andrea	41606192	mdlaavelazquez@udc.edu.ar
VELAZQUEZ	Sebastian Alejandro	39442820	savelazquez@udc.edu.ar
VELAZQUEZ	Shiara Jamiel	41041096	sjvelazquez@udc.edu.ar
VELOSO	Ana María	22682182	amveloso@udc.edu.ar
VERA	Amanda Ludmila	36334880	alvera@udc.edu.ar
VERA	Andrea Belén	33392788	abvera@udc.edu.ar
VERA	Franco Jesus Daniel	40384824	fjdvera@udc.edu.ar
VERA	Maria Alejandra	31261199	mavera@udc.edu.ar
VERA	Pamela Johana	37550816	pjvera@udc.edu.ar
VERA MENENDEZ	Graciela Estefany	35172952	geveramenendez@udc.edu.ar
VERON	Daniela	37700293	dveron@udc.edu.ar
VERON	Lucas Gonzalo	36724666	lgveron@udc.edu.ar
VICTORIA	Marcia Andrea	35888450	mavictoria@udc.edu.ar
VIDABLE	Emmanuel Oscar	31936806	eovidable@udc.edu.ar
VIDAL	Florencia Ayelen	38804595	favidal@udc.edu.ar
VIDAL	Franco Nahuel	37347075	fnvidal@udc.edu.ar
VIDAL	Ignacio Agustin	38806118	iavidal@udc.edu.ar
VIDAL	Silvia Florencia	41118511	sfvidal@udc.edu.ar
VIDAL MOREIRA	Ivan Elias	41793262	ievidalmoreira@udc.edu.ar
VIDAL VASQUEZ	Delicia	94112286	dvidalvasquez@udc.edu.ar
VIDAURRE	Rocio Nancy	41408699	rnvidaurre@udc.edu.ar
VIDELA	Betiana Belen	31504713	bbvidela@udc.edu.ar
VILCA	Anahí Shionshetr	37836151	asvilca@udc.edu.ar
VILCHES	Carlos Julian	38798228	cjvilches@udc.edu.ar
VILCHES BELLO	Maribel Lisette	38805533	mlvilchesbello@udc.edu.ar
VILLAFAÑE	Glenda Micaela	38807498	gmvillafane@udc.edu.ar
VILLAGRA	Enzo Ariel	41220067	eavillagra@udc.edu.ar
VILLAGRA	Nadia	33478480	nvillagra@udc.edu.ar
VILLAGRA	Noelia Verónica	25782911	nvvillagra@udc.edu.ar
VILLAGRAN	Edgar Nelson	37067478	envillagran@udc.edu.ar
VILLAGRAN	Rocio del Cielo	38806174	rdcvillagran@udc.edu.ar
VILLALBA	Ana Belen	33345442	abvillalba@udc.edu.ar
VILLALBA	Maria Belen	40857015	mbvillalba@udc.edu.ar
VILLAR	Kendra Priscilla	42969554	kpvillar@udc.edu.ar
VILLARREAL	María de los Ángeles	30648174	mdlavillarreal@udc.edu.ar
VILLIVAR	Carina Paola	31233604	cpvillivar@udc.edu.ar
VILLIVAR	Fernando	39441859	fvillivar@udc.edu.ar
VILLIVAR	Jaqueline Vanesa	40208567	jvvillivar@udc.edu.ar
VILLIVAR	Micaela	38535747	mvillivar@udc.edu.ar
VILLIVAR	Natalia	40207849	nvillivar@udc.edu.ar
VIQUE	Lucila Ester	26920830	levique@udc.edu.ar
VIQUE SUBIA	Roxvania	94750637	rviquesubia@udc.edu.ar
VIÑA	Federico Adrián	38080929	favina@udc.edu.ar
VULCANO	Alejandro Gabriel	30823428	agvulcano@udc.edu.ar
VULCANO	Cristian Pablo	31883948	cpvulcano@udc.edu.ar
WALKER	Carlos Osvaldo	31914602	cowalker@udc.edu.ar
WEISE	Kevin Fernando	38147388	kfweise@udc.edu.ar
WILLIAMS	Daiana Alejandra	40384646	dawilliams@udc.edu.ar
WILLIAMS	Maia Denisse	40208074	mdwilliams@udc.edu.ar
WILLIAMS	Roberto Ezequiel	37937092	rewilliams@udc.edu.ar
WILLIAMS	Stella Maris	36393054	smwilliams@udc.edu.ar
WILLIAMS	Walter Rafael	40872077	wrwilliams@udc.edu.ar
WODICKA	María José	37860511	mjwodicka@udc.edu.ar
WOHN	Eduardo Agustín	38784307	eawohn@udc.edu.ar
YALATAQUE	Cristina	36914488	cyalataque@udc.edu.ar
YANCA	Maria Belen	39441230	mbyanca@udc.edu.ar
YAUPI	Beatriz Soledad	31500037	bsyaupi@udc.edu.ar
YAÑEZ	Bettiana Yanet	33497317	byyanez@udc.edu.ar
YAÑEZ	Jessica Soledad	37046833	jsyanez@udc.edu.ar
YEGROS	Keila Ariadna	40206937	kayegros@udc.edu.ar
YUCGRA	Luciana Fátima	41487855	lfyucgra@udc.edu.ar
ZABALA	Erica Johana	36111276	ejzabala@udc.edu.ar
ZABALA	Veronica Elizabeth	37973428	vezabala@udc.edu.ar
ZALAZAR	Federico Sebastian	36650550	fszalazar@udc.edu.ar
ZAMBRANA	Erica Gabriela	37666496	egzambrana@udc.edu.ar
ZAMBRANA BORDA	Norma	19017290	nzambranaborda@udc.edu.ar
ZAMBRANO	Gisell Giovana	38093082	ggzambrano@udc.edu.ar
ZAMBRANO	Javier Emmanuel	37147799	jezambrano@udc.edu.ar
ZAPATA	Jose Braian	46624052	jbzapata@udc.edu.ar
ZAPATA	Maria Antonella	46624051	mazapata@udc.edu.ar
ZAPATA HERRERA	Pablo Eliecer	93989719	pezapataherrera@udc.edu.ar
ZARIAS	Jessica Elizabeth	32220201	jezarias@udc.edu.ar
ZARZA	Debora Noemi	35336926	dnzarza@udc.edu.ar
ZEBALLOS	Rocio Belén	38806075	rbzeballos@udc.edu.ar
ZUÑIGA	Jessica Alejandra	41597341	jazuniga@udc.edu.ar
ZUÑIGA BUSTAMANTE	Carlos Damián	41017125	cdzunigabustamante@udc.edu.ar
ÑANCO	Carla Romina	32887837	crnanco@udc.edu.ar
ÑANCO	Nancy Elizabeth	38168067	nenanco@udc.edu.ar
ÑANCO	Norma Estela	33775323	nenanco1@udc.edu.ar
ÑANCUAN	Anahí Ailín	40209772	aanancuan@udc.edu.ar
ÑANCUFIL	Jonathan Jesus	36526484	jjnancufil@udc.edu.ar
ÑANCULEO	Malena Florencia	39203943	mfnanculeo@udc.edu.ar
ÑANCUTIL	Gabriela Belén	33222316	gbnancutil@udc.edu.ar
ÑIRIPIL	Mariana Belen	41089552	mbniripil@udc.edu.ar


*/











   

    /*
    //Creamos instancia de Faker
    $faker = Faker::create('es_ES');
    //Creamos bucle para cubrir N ActividadesEspecificaTableSeeder
    for ($i=0; $i<9; $i++)
    {
      //llamamos al Metodo Create del Modelo para crear una nueva fillable
      User::create(
      [
        'username'=>$faker->unique($reset = true)->userName(),
        'email'=>$faker->unique($reset = true)->safeEmail(),
        'password'=>Hash::make(123456)
      ]);
    }
    */

  }
}
