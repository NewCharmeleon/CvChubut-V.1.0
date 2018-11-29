-- phpMyAdmin SQL Dump
-- version 4.5.4.1deb2ubuntu2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 08-08-2018 a las 12:56:09
-- Versión del servidor: 5.7.23-0ubuntu0.16.04.1
-- Versión de PHP: 7.0.30-0ubuntu0.16.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `CvChubutBBDD`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades`
--

CREATE TABLE `actividades` (
  `id` int(10) UNSIGNED NOT NULL,
  `institucion_id` int(10) UNSIGNED NOT NULL,
  `persona_id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `actividad_tipo_id` int(10) UNSIGNED NOT NULL,
  `ambito_actividad_id` int(10) UNSIGNED NOT NULL,
  `tipo_participacion_id` int(10) UNSIGNED NOT NULL,
  `modalidad_id` int(10) UNSIGNED NOT NULL,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `duracion` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `referente` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `lugar` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `actividades`
--

INSERT INTO `actividades` (`id`, `institucion_id`, `persona_id`, `nombre`, `actividad_tipo_id`, `ambito_actividad_id`, `tipo_participacion_id`, `modalidad_id`, `fecha_ini`, `fecha_fin`, `duracion`, `referente`, `lugar`, `created_at`, `updated_at`) VALUES
(1, 3, 0, 'manuel_alfonso', 3, 22, 25, 0, '2011-11-19', '1970-01-01', 8, 'burke,_con_lord_north,_con_el_rostro_pálido.', 'después_dijo:_«lo_malo_será_que_los_nuestros:.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(2, 2, 0, 'sra._jana_pastor', 8, 1, 20, 3, '1985-02-17', '1970-01-01', 9, 'todos_callábamos,_y_los_juegos;_ya_no_pensábamos.', 'martina,_rosario_la_cocinera,_marcial_y_yo.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(3, 7, 0, 'biel_estrada', 22, 17, 7, 3, '2011-06-20', '1970-01-01', 9, 'bueno_y_sano-_contestó_d._alonso-_._me_parece.', 'doña_francisca-_._ahí_están_gravina,_valdés.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(4, 0, 0, 'daniel_esteban', 7, 10, 21, 3, '2012-02-11', '1970-01-01', 5, 'el_plazo_no_podía_permanecer_callada_después_de.', 'villeneuve_había_arriado_bandera._una_vez.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(5, 3, 0, 'nuria_beltrán_segundo', 20, 9, 13, 1, '2010-07-30', '1970-01-01', 4, 'en_fin,_tales_eran_los_disparates_que_salían_por.', 'doña_francisca!_¡bonito_se_puso_a_merced_de_las.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(6, 1, 0, 'víctor_gaytán', 3, 10, 5, 3, '2012-11-29', '1970-01-01', 2, 'el_"bucentauro",_navío_general-_._bien_"haiga".', 'esto_que_veo,_¿no_prueba_que_comprende_y_aprecia.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(7, 9, 0, 'carla_luevano_tercero', 22, 11, 10, 3, '1976-11-13', '1970-01-01', 2, 'la_verdad_es_que_realmente_dijo_alguien_tal.', 'villeneuve,_y_cuando_yo_sea_grande_experimente.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(8, 8, 0, 'pau_toro_tercero', 8, 20, 15, 3, '2001-12-25', '1970-01-01', 6, 'gibraltar_tras_de_nosotros_y_nos_ataca,_debemos.', 'patillas_tan_suelto_por_españa_haciendo.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(9, 5, 0, 'teresa_trejo', 10, 22, 14, 3, '2009-01-18', '1970-01-01', 3, 'marcial_y_yo_continuaba_siendo_niño!_no_necesito.', 'la_defensa_de_boulou,_no_nos_den_un_mal_sueño.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(10, 10, 0, 'lucas_riojas', 2, 2, 25, 0, '1991-03-08', '1970-01-01', 4, 'unos_le_creyeron_francés,_otros_inglés,_y.', 'así_andan_las_cosas_grandes,_las_naciones_a_que.', '2018-08-08 18:52:55', '2018-08-08 18:52:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `actividades_tipos`
--

CREATE TABLE `actividades_tipos` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `actividades_tipos`
--

INSERT INTO `actividades_tipos` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'my_notion_was_that.', 'he_looked_at_poor_alice,_\'when_one_wasn\'t_always.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(2, 'i_had_our_dinah.', 'but,_now_that_i\'m_perfectly_sure_i_can\'t.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(3, 'let_me_think:_was.', 'dormouse,_without_considering_at_all_a_pity._i.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(4, 'first,_she_tried.', 'alice_looked_at_alice,_as_the_lory_positively.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(5, 'i_look_like_it?\'.', 'they_are_waiting_on_the_top_of_his_shrill_little.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(6, 'but_she_did_so.', 'gryphon,_\'you_first_form_into_a_sort_of_meaning.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(7, 'and_yet_you.', 'she_hastily_put_down_yet,_before_the_trial\'s.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(8, 'i_wish_you.', 'tortoise,_if_he_would_deny_it_too:_but_the.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(9, 'i_dare_say_there.', 'what_things?\'_said_the_queen,_\'really,_my_dear.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(10, 'i_shan\'t_grow_any.', 'i\'m_sure_she\'s_the_best_cat_in_the_distance.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(11, 'please,_ma\'am,_is.', 'march_hare,_\'that_"i_breathe_when_i_got_up_this.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(12, 'queen,_the_royal.', 'the_queen\'s_croquet-ground_a_large_rose-tree.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(13, 'alice._\'that\'s_the.', 'precious_nose\';_as_an_explanation;_\'i\'ve_none_of.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(14, 'i_hadn\'t_gone_down.', 'i_hadn\'t_gone_down_that_rabbit-hole--and.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(15, 'majesty_must.', 'who_cares_for_fish,_game,_or_any_other_dish?_who.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(16, 'alice._\'and_where.', 'alice_in_a_tone_of_great_curiosity._\'it\'s_a.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(17, 'alice_did_not_dare.', 'alice,_rather_doubtfully,_as_she_ran._\'how.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(18, 'for_anything.', 'after_a_minute_or_two,_which_gave_the_pigeon_had.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(19, 'alice._\'i\'m_not_a.', 'alice._\'and_where_have_my_shoulders_got_to?_and.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(20, 'hatter_was_the.', 'there_was_a_dead_silence._\'it\'s_a_cheshire_cat,\'.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(21, 'queen._\'you_make.', 'i_think?\'_\'i_had_not!\'_cried_the_gryphon,_before.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(22, 'fit_you,\'_said_the.', 'i_was_a_paper_label,_with_the_bread-and-butter.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(23, 'queen_ordering_off.', 'me,\'_said_alice_to_herself,_as_she_ran._\'how.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(24, 'alice,_very.', 'i_wonder?\'_and_here_alice_began_to_say_it_out_to.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(25, 'first,_she_dreamed.', 'and_beat_him_when_he_finds_out_who_was_trembling.', '2018-08-08 18:52:55', '2018-08-08 18:52:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ambitos_actividades`
--

CREATE TABLE `ambitos_actividades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `ambitos_actividades`
--

INSERT INTO `ambitos_actividades` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'tal_sociedad_me.', 'collingwood._mientras_trababa_combate_con_este.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(2, 'pero_no_sé_qué.', 'mi_amo_miró_sonriendo_una_mala_estampa_clavada.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(3, 'observando_la.', 'marcial:_los_tres_años_se_pasaron_sin_sospechar.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(4, 'además,_estamos_a.', 'dios_la_cosa._todavía_no_puedes_ni_encender_una.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(5, 'por_mi_imaginación.', 'rosita,_pues_ya_he_cumplido,_y_dentro_de_la.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(6, 'Álava_mandó_que_se.', 'el_servicio_de_piezas_y_lo_peor_del_caso_es_que.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(7, 'volvió,_no_sé.', 'el_plazo_no_podía_menos_de_contemplarle_un_rato.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(8, 'el_"bucentauro".', 'rey_y_su_belleza_respetable_habría_sido_funesto.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(9, 'justo",_de_76.', 'napoleón_mandó_a_los_carpinteros._trabajosamente.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(10, 'este,_si_para.', 'pero_no_quiero_cansar_al_lector_con_pormenores.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(11, 'el_vendaval_había.', 'cuando_bajó_mi_amo,_el_oficial_inglés_que_es.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(12, 'corría_por_las.', 'napoleón_había_transportado_en_poco_tiempo.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(13, 'el_interés_de.', 'ulm_el_desfile_de_las_velas_con_más_agujeros_que.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(14, 'bellegarde»..', 'no_puedo_pintar_a_ustedes_tanto_como_la.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(15, 'collingwood_el.', 'lo_que_más_me_sorprendió_fue_que_los_han_visto.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(16, 'entonces.', 'la_ansiedad_era_general,_y_no_había_parecido.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(17, 'el_sol_inundaba_de.', 'así_pensaba_yo._después_de_la_senectud_entorpece.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(18, 'como_niños_ambos.', 'los_niños_también_suelen_pensar_grandes_cosas;_y.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(19, 'santa_inquisición.', 'cádiz,_como_hubiera_deseado,_me_aburría_en_la.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(20, 'nos_zampamos_en_un.', 'jesús»._el_sol_inundaba_de_luz_la_magnífica.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(21, 'vejer._«como_la.', 'el_sol,_encendiendo_los_vidrios_de_sus_heridas_y.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(22, 'lo_particular_es.', 'como_tenía_la_conciencia_de_mi_vida,_y_no_digo.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(23, 'españa._además_de.', 'ezguerra,_y_además_traicionero._tiene_mala.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(24, 'generalísimo_de.', 'pues_de_ésta_me_despido-_prosiguió_el_embustero-.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(25, 'doña_francisca_muy.', 'me_parece_que_le_han_hecho,_primer_ministro._así.', '2018-08-08 18:52:55', '2018-08-08 18:52:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carreras`
--

CREATE TABLE `carreras` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cantidad_materias` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `experiencias_laborales`
--

CREATE TABLE `experiencias_laborales` (
  `id` int(10) UNSIGNED NOT NULL,
  `puesto` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion_de_tareas` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `fecha_ini` date DEFAULT NULL,
  `fecha_fin` date DEFAULT NULL,
  `empleador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provincia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `referencia` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `rentado` tinyint(1) NOT NULL,
  `mostrar_cv` tinyint(1) NOT NULL DEFAULT '1',
  `persona_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `experiencias_laborales`
--

INSERT INTO `experiencias_laborales` (`id`, `puesto`, `descripcion_de_tareas`, `fecha_ini`, `fecha_fin`, `empleador`, `localidad`, `provincia`, `referencia`, `rentado`, `mostrar_cv`, `persona_id`, `created_at`, `updated_at`) VALUES
(1, 'sr._don_alonso,_al_cual.', 'si_mi_amita_me_hubiera_cambiado_por_nelson._amaneció_el_19,_que_fue_tiernísima,_y_por_las_torpezas.', '2005-04-25', '1970-01-01', 'churruca_vio_con_el_general_conwallis_y_otros.', 'en_todas_las_funciones_de_mi_persona,_si_no.', 'jerez._-_era_un_valiente_marino._-_pues_en_la.', 'si_ella_corría_como_una_gacela,_yo_volaba_como.', 1, 1, 0, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(2, 'pero_paca_no_te_asustes....', 'dio_las_gracias_a_la_guerra._asociados_estos_dos_sentimientos._¡pobre_amita_mía!_¡cuán_grande.', '1989-10-12', '1970-01-01', 'ave-maría,_sino_algo_nuevo_que_a_bordo_del.', 'la_escuadra_española_en_la_travesía._algo_de.', 'malespina_había_sido_contramaestre_en_barcos_de.', 'en_fin,_tales_eran_los_disparates_que_salían_de.', 1, 1, 0, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(3, 'nosotros_contemplábamos_su.', 'd._alonso_debió_de_darle_una_lección_de_caballerosidad,_porque_le_oí_claramente_estas_palabras:.', '1979-12-13', '1970-01-01', 'rosita,_pues_ya_he_cumplido,_y_dentro_de_mi.', 'los_navíos_que_nos_incita_a_ser_relevado_le.', 'mandábalo,_como_he_dicho,_pues_sólo_me_fundo_en.', 'la_parte_perversa_de_mi_ser._¿podrán_todos_decir.', 0, 1, 0, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(4, 'no_me_parece_que_siento_bajo.', 'finisterre_y_antes_el_terrible_efecto_causado_en_los_recuerdos_como_lo_permitía_la_escualidez_del.', '2001-03-13', '1970-01-01', 'cádiz._en_vano_se_había_esforzado_por.', 'veo_que_tú_eres_un_niño._pero_yo..._bien_que.', 'bonaparte_armaría_la_guerra_del_rosellón.', 'y_si_vieron_a_los_pollos_para_que_no_pude_por_un.', 1, 1, 0, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(5, 'le_acompañaba_en_tan_alto.', 'yo_fui_testigo_a_bordo._¿qué_es_de_un_disparo_la_escuadra_para_presenciar_el_próximo_combate._ya.', '1995-03-22', '1970-01-01', 'por_cobardes_no,_pero_sí_por_prudentes._eso_es..', 'marcial_una_acción_común_y_corriente_entre_sus.', 'de_esta_fecha_no_me_oyeron_o_no_la_sabe_y_voy_a.', 'para_mí,_era_rosita_entonces_lo_primero_que.', 1, 1, 0, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(6, 'también_oí_que_era_el_más.', 'rosita,_pues_ya_no_era_posible_ver_nada._el_viento_soplaba_con_mucha_fuerza,_y_por_los_ingleses..', '2005-11-26', '1970-01-01', 'francisca_para_obtener_su_benevolencia-_,_que_si.', 'd._rafael?_¿qué_ha_sido_vilmente_engañado,_y_mi.', 'la_bruma,_el_humo,_los_fogonazos,_las.', 'paca_no_ve_las_cosas_de_los_buques_enemigos....', 1, 1, 0, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(7, 'flora,_y_que_no_perecieran.', 'Él_la_conservó,_y_cuando_se_fondeaban_frente_a_una_batalla_para_que_no_sirves_para_nada._¡jesús!.', '2006-12-29', '1970-01-01', 'al_punto_llamé_a_débora_y_le_hallé_empeñado_en.', 'llegué_por_fin_a_rota,_y_allí_encontraba,_más.', 'dicen_que_cuando_entramos_en_él_pasó;_pero_es.', 'cádiz_que_en_aquella_faena,_y_por_haber,_con_más.', 0, 1, 0, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(8, 'mas_el_francés_nombrado.', 'pero_estas_dolorosas_alternativas_cesaron_por_la_mañana_el_zafarrancho,_preparado_ya_todo_lo.', '1998-09-25', '1970-01-01', 'd._rafael...-_le_dijo_compasivamente_doña.', 'alcalá_galiano_y_a_no_servir_ni_en_la.', 'la_vista_se_mareaba_y_se_hallaban_suspendidos.', 'corte_de_madrid,_y_poner_barcos_y_los_cañones_se.', 0, 1, 0, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(9, 'doña_flora_de_cisniega.', 'en_las_grandes_cosas,_no_se_habría_perdido,_entabló_la_conversación_recayó_sobre_la_escuadra_para.', '1980-06-21', '1970-01-01', 'esperé_dos_días_más_para_romper_el_endeble.', 'd._josé_maría-_._es_decir,_sano,_no;_pero_fuera.', 'cinco_navíos_ingleses_se_había_embarcado_en_el..', 'a_medida_que_nos_había_infundido._»rindiose_el.', 0, 1, 0, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(10, 'mancha_a_la_verga_mayor_para.', 'mi_amo,_desde_hace_diez_años..._a_fe_que_debían_haberte_hecho_almirante_cuando_menos,_que_harto_lo.', '2011-07-01', '1970-01-01', 'más_vale_morirse_a_tu_edad_que_yo._estos_tres.', 'napoleón_había_transportado_en_poco_tiempo_me.', 'yo_no_sé_lo_que_te_lo_he_dicho_más_mentiras_que.', 'pero_ninguno_de_los_muertos_que_conocía,_y.', 1, 1, 0, '2018-08-08 18:52:55', '2018-08-08 18:52:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `instituciones`
--

CREATE TABLE `instituciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `localidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `provincia` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `pais` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `instituciones`
--

INSERT INTO `instituciones` (`id`, `nombre`, `localidad`, `provincia`, `pais`, `created_at`, `updated_at`) VALUES
(1, 'estuvo_bueno,_aunque_eso_no.', 'desde_que_quedó_viuda,_se_mantenía_a_cierta.', 'santiago._si_el_"señorito"_la_corta,_adiós_mi.', 'creo_que_me_llamaban_"el_chistoso_español"..', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(2, 'el_fuego_cesó_y_los_que_les.', 'pero_dejemos_al_marino_y_volvamos_a_doña_flora..', 'sus_amigos_le_descubrieron,_aunque_él_trataba_de.', 'era_doña_flora_se_empeñó_en_llevarme_a_pasear_a.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(3, 'américa_cargadas_de.', 'tal_sociedad_me_agradaba_más_que_la_imprenta._en.', 'como_su_carácter_era_sumamente_blando),_me_dijo:.', 'd._rafael_malespina,_acontecimiento_que_hubo_de.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(4, 'madrid._que_vengan_ellos_a.', 'el_comandante_iriartea_y_el_guardia_marina_don.', 'yo_había_perdido_el_juicio_para_intentar.', 'alonsito,_dándote_tres_o_cuatro_grados_de.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(5, 'esto_no_pasa_en_ninguna.', 'entre_tanto_no_era_preciso_tanto..._¡cuarenta.', 'en_la_época_a_que_se_le_reformó,_agradándolo_en.', 'llegué_por_fin,_y_entré_en_la_cubierta,_desde.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(6, 'siete_mil_toneladas,_el.', 'diéronme_a_beber_no_sé_cuándo,_a_iluminar.', 'caí_gravemente_enfermo_de_la_poca_destreza_de_la.', 'cádiz._-_también_oí_que_dijeron:_«la_arena.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(7, 'estos_no_sólo_para_aumentar.', 'salí_como_pude,_diciendo_que_si_el_vendaval_tan.', 'algo_de_esto_me_parece_que_se_perdió_como_un.', 'churruca,_además_de_aquéllas,_otra_poderosísima.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(8, 'el_lugar_más_terrible_de.', 'subir_por_orden_suya_al_naranjo_del_patio_para.', 'un_poco_de_"olé",_ni_esconderse_de_mí_mismo;_la.', 'estos_no_sólo_transportaron_los_heridos_a.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(9, 'África_y_me_maravillé.', 'para_esto_se_comprenderá_que_el_hielo_de_la.', 'por_las_escotillas_salía_un_lastimero_clamor.', 'medio-hombre_había_asistido_a_otras_muchas.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(10, 'cádiz_o_a_la_vez,_mezclado.', 'a_la_edad_cansada,_y_no_tuvimos_más_percance_que.', 'no_había_éste_pronunciado_dos_palabras,_cuando.', 'quiera_dios_que_les_había_ocasionado._yo_me.', '2018-08-08 18:52:55', '2018-08-08 18:52:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(13, '2017_07_02_000001_create_users_table', 1),
(14, '2017_07_02_000002_create_password_resets_table', 1),
(15, '2017_07_02_000003_entrust_setup_tables', 1),
(16, '2018_07_30_163705_create_carreras_table', 1),
(17, '2018_07_30_163706_create_personas_table', 1),
(18, '2018_07_30_163708_create_experiencias_laborales_table', 1),
(19, '2018_07_30_163709_create_actividades_tipos_table', 1),
(20, '2018_08_01_001617_create_modalidades_table', 1),
(21, '2018_08_01_152530_create_ambitos_actividades_table', 1),
(22, '2018_08_01_154703_create_tipos_participaciones_table', 1),
(23, '2018_08_01_160904_create_instituciones_table', 1),
(24, '2018_08_01_163757_create_actividades_table', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `modalidades`
--

CREATE TABLE `modalidades` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `modalidades`
--

INSERT INTO `modalidades` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'desde_que_empezó.', 'marcial-_,_mr._corneta_en_persona;_la.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(2, 'san_josé_bendito!.', 'pues,_señor,_el_"comodón"_tenía_orden_de_traer_a.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(3, 'dios_mío?_¿por_qué.', 'después_quise_enterarme_de_cómo_me_salvé,_no.', '2018-08-08 18:52:55', '2018-08-08 18:52:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permissions`
--

CREATE TABLE `permissions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `permission_role`
--

CREATE TABLE `permission_role` (
  `permission_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `personas`
--

CREATE TABLE `personas` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre_apellido` varchar(45) COLLATE utf8_unicode_ci NOT NULL,
  `dni` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nacionalidad` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'n/c',
  `fecha_nac` date DEFAULT NULL,
  `telefono` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `user_id` int(10) UNSIGNED NOT NULL,
  `carrera_id` int(10) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `personas`
--

INSERT INTO `personas` (`id`, `nombre_apellido`, `dni`, `nacionalidad`, `fecha_nac`, `telefono`, `user_id`, `carrera_id`, `created_at`, `updated_at`) VALUES
(1, 'jorge_guajardo', '1357911', 'Argentina', '1985-03-20', '', 1, NULL, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(2, 'daniel_matos', '1357911', 'Argentina', '1995-12-29', '', 2, NULL, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(3, 'nadia_gutiérrez', '1357911', 'Argentina', '1997-03-27', '', 3, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(4, 'aballay_belen_ayelen', '38804297', 'n/c', NULL, '', 4, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(5, 'abarzua_delia_rocio', '39440366', 'n/c', NULL, '', 5, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(6, 'abraham_bruno_stefano', '41525735', 'n/c', NULL, '', 6, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(7, 'ing._angela_carrasquillo', '11774749', 'ad', '1977-11-13', '2804143787', 2, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(8, 'lidia_barela_segundo', '17607139', 'eum', '1987-01-14', '2804525403', 4, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(9, 'fernando_ureña', '44226354', 'eaque', '1975-02-14', '2804959777', 3, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(10, 'Óscar_hurtado', '34099768', 'qui', '2005-08-29', '2804960275', 5, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(11, 'ing._pedro_serrano', '24057403', 'repellendus', '2018-06-20', '2804981726', 5, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(12, 'joan_gaitán', '26681354', 'architecto', '2005-06-23', '2804287534', 4, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(13, 'yago_santiago', '26667200', 'voluptates', '1981-07-30', '2804288778', 2, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(14, 'leyre_garica', '12351867', 'error', '1985-05-26', '2804910728', 2, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(15, 'leyre_zaragoza', '42992995', 'alias', '1983-07-20', '2804448823', 4, NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `name`, `display_name`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Administrador', 'Administrador', 'Persona con permisos para controlar el Sistema', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(2, 'Secretaria', 'Secretaria', 'Persona con permisos para gestionar los Estudiantes y/o Personas', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(3, 'Estudiante', 'Estudiante UDC', 'persona con permisos para ver y editar su perfil junto a sus Actividades', '2018-08-08 18:52:55', '2018-08-08 18:52:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `role_user`
--

CREATE TABLE `role_user` (
  `user_id` int(10) UNSIGNED NOT NULL,
  `role_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `role_user`
--

INSERT INTO `role_user` (`user_id`, `role_id`) VALUES
(1, 1),
(2, 2),
(3, 3),
(4, 3),
(5, 3),
(6, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos_participaciones`
--

CREATE TABLE `tipos_participaciones` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `descripcion` varchar(255) COLLATE utf8_unicode_ci DEFAULT '',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tipos_participaciones`
--

INSERT INTO `tipos_participaciones` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`) VALUES
(1, 'mi_turbación_no_me.', 'y_no_digo_esto_juzgando_por_lo_que_aquella.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(2, 'trinidad";_pero.', 'orejón,_la_caleta,_y_me_hallé_en_los_botes_de_la.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(3, 'al_ver_la.', 'no_tardó,_sin_embargo,_el_respeto_más_vivo._recé.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(4, 'teníamos_la_misma.', 'detonación_espantosa,_más_fuerte_que_la_justicia.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(5, 'bueno:_cuando_las.', 'encerráronse_en_el_jardín,_puse_el_pie_derecho.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(6, 'mis_amos_supieron.', 'medio-hombre_se_decidió_a_echar_unas_cañas»..', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(7, 'todo_se_acabó.', 'churruca_como_sabio_y_como_el_gladiador_que_no.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(8, 'd._alonso,_que.', 'ya_sabes_que_una_resolución_súbita_me_arrancó_de.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(9, 'dios_quiso_que_él.', 'las_opiniones_fueron_diversas,_y_se_acercaban.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(10, 'de_repente_un.', 'mi_amo_miró_sonriendo_una_mala_estampa_clavada.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(11, 'ana",_el_"victory".', 'mas_el_francés_nombrado_"achilles"._la_expansión.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(12, 'diciembre_del.', 'se_me_permitirá_que_antes_de_la_vida!,_pensaba.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(13, 'los_chicos_ven.', 'no_se_les_envuelva_en_el_combate_mismo,_como.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(14, 'esos_son_juguetes.', 'mi_corazón_concluía_siempre_por_llenarse_de.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(15, 'mr._corneta_quiere.', 'sanlúcar._en_la_travesía_del_barco_naufragado_a.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(16, 'aquí_estoy.', 'murió_mucho_después_de_haber_dicho_que_si_el.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(17, 'luego,_como.', 'el_general-_contestó_malespina-_,_churruca_tenía.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(18, 'adornó_su_leyenda.', 'las_vendas_de_su_mano_si_observara_mis.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(19, 'dios;_he_cumplido.', 'para_evitar_el_efecto_de_la_escuadra,_y.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(20, 'sanlúcar.', 'villeneuve._aquí_se_ha_convertido_en.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(21, 'Álava,_quien,_a.', 'paca_no_ve_las_cosas_de_los_cuatro_navíos_que.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(22, 'd._alonso_y.', 'marcial_para_que_ustedes_se_diviertan_con_ellos..', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(23, 'cádiz,_con_la_más.', 'yo_creo_que_gravina_no_debió_haber_cedido_a_la.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(24, 'yo_hice_un_gran.', 'según_mis_ideas,_con_este_asunto_la_relación_de.', '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(25, 'temían_a_nuestro.', 'con_los_primeros_hacía_yo_viendo_cómo.', '2018-08-08 18:52:55', '2018-08-08 18:52:55');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'administrador_udc', 'administrador@udc.edu.ar', '$2y$10$x2IBbjvkcxEmZjRh0u0NGe9h8r3W/ehl9T6yVVOEoUrebboTCMgkW', NULL, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(2, 'secretaria_udc', 'secretaria@udc.edu.ar', '$2y$10$8itZeiXD2sQ/x75TK83rTOyqmbXYmZWttF94SN8rFrYBE4kiA6FZm', NULL, '2018-08-08 18:52:55', '2018-08-08 18:52:55'),
(3, 'alumno', 'alumno@udc.edu.ar', '$2y$10$Daf807bRfhXIFEyJBljr5O3JcK7cdajIvr3MJqvbOGhIf7or0IpE2', NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(4, 'baaballay', 'baaballay@udc.edu.ar', '$2y$10$XVOHT5zJQzOyxYF.VZxxOOusFzvd6nUQaaqj8KhNpMz.CElloLuEi', NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(5, 'drabarzua', 'drabarzua@udc.edu.ar', '$2y$10$S1Jsj6WUmvAYwOGcxg09Pu6dcvCbU/t5DZDU5HcMFpkAeOETPs5Ja', NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56'),
(6, 'bsabraham', 'bsabraham@udc.edu.ar', '$2y$10$31EPPVbL7iymaZoNq1E7meLybMb5PpivFsIePZkWEhpkRhYo8IzIq', NULL, '2018-08-08 18:52:56', '2018-08-08 18:52:56');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `actividades_nombre_unique` (`nombre`),
  ADD KEY `actividades_institucion_id_foreign` (`institucion_id`),
  ADD KEY `actividades_persona_id_foreign` (`persona_id`),
  ADD KEY `actividades_actividad_tipo_id_foreign` (`actividad_tipo_id`),
  ADD KEY `actividades_ambito_actividad_id_foreign` (`ambito_actividad_id`),
  ADD KEY `actividades_tipo_participacion_id_foreign` (`tipo_participacion_id`),
  ADD KEY `actividades_modalidad_id_foreign` (`modalidad_id`);

--
-- Indices de la tabla `actividades_tipos`
--
ALTER TABLE `actividades_tipos`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `actividades_tipos_nombre_unique` (`nombre`);

--
-- Indices de la tabla `ambitos_actividades`
--
ALTER TABLE `ambitos_actividades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `ambitos_actividades_nombre_unique` (`nombre`);

--
-- Indices de la tabla `carreras`
--
ALTER TABLE `carreras`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `experiencias_laborales`
--
ALTER TABLE `experiencias_laborales`
  ADD PRIMARY KEY (`id`),
  ADD KEY `experiencias_laborales_persona_id_foreign` (`persona_id`);

--
-- Indices de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `modalidades_nombre_unique` (`nombre`);

--
-- Indices de la tabla `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indices de la tabla `permissions`
--
ALTER TABLE `permissions`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `permissions_name_unique` (`name`);

--
-- Indices de la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD PRIMARY KEY (`permission_id`,`role_id`),
  ADD KEY `permission_role_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `personas`
--
ALTER TABLE `personas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `personas_user_id_foreign` (`user_id`),
  ADD KEY `personas_carrera_id_foreign` (`carrera_id`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `roles_name_unique` (`name`);

--
-- Indices de la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD PRIMARY KEY (`user_id`,`role_id`),
  ADD KEY `role_user_role_id_foreign` (`role_id`);

--
-- Indices de la tabla `tipos_participaciones`
--
ALTER TABLE `tipos_participaciones`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tipos_participaciones_nombre_unique` (`nombre`);

--
-- Indices de la tabla `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `actividades`
--
ALTER TABLE `actividades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `actividades_tipos`
--
ALTER TABLE `actividades_tipos`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `ambitos_actividades`
--
ALTER TABLE `ambitos_actividades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `carreras`
--
ALTER TABLE `carreras`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `experiencias_laborales`
--
ALTER TABLE `experiencias_laborales`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `instituciones`
--
ALTER TABLE `instituciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT de la tabla `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
--
-- AUTO_INCREMENT de la tabla `modalidades`
--
ALTER TABLE `modalidades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `permissions`
--
ALTER TABLE `permissions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `personas`
--
ALTER TABLE `personas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT de la tabla `tipos_participaciones`
--
ALTER TABLE `tipos_participaciones`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;
--
-- AUTO_INCREMENT de la tabla `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `actividades`
--
ALTER TABLE `actividades`
  ADD CONSTRAINT `actividades_actividad_tipo_id_foreign` FOREIGN KEY (`actividad_tipo_id`) REFERENCES `actividades_tipos` (`id`),
  ADD CONSTRAINT `actividades_ambito_actividad_id_foreign` FOREIGN KEY (`ambito_actividad_id`) REFERENCES `ambitos_actividades` (`id`),
  ADD CONSTRAINT `actividades_institucion_id_foreign` FOREIGN KEY (`institucion_id`) REFERENCES `instituciones` (`id`),
  ADD CONSTRAINT `actividades_modalidad_id_foreign` FOREIGN KEY (`modalidad_id`) REFERENCES `modalidades` (`id`),
  ADD CONSTRAINT `actividades_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`),
  ADD CONSTRAINT `actividades_tipo_participacion_id_foreign` FOREIGN KEY (`tipo_participacion_id`) REFERENCES `tipos_participaciones` (`id`);

--
-- Filtros para la tabla `experiencias_laborales`
--
ALTER TABLE `experiencias_laborales`
  ADD CONSTRAINT `experiencias_laborales_persona_id_foreign` FOREIGN KEY (`persona_id`) REFERENCES `personas` (`id`);

--
-- Filtros para la tabla `permission_role`
--
ALTER TABLE `permission_role`
  ADD CONSTRAINT `permission_role_permission_id_foreign` FOREIGN KEY (`permission_id`) REFERENCES `permissions` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `permission_role_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Filtros para la tabla `personas`
--
ALTER TABLE `personas`
  ADD CONSTRAINT `personas_carrera_id_foreign` FOREIGN KEY (`carrera_id`) REFERENCES `carreras` (`id`),
  ADD CONSTRAINT `personas_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Filtros para la tabla `role_user`
--
ALTER TABLE `role_user`
  ADD CONSTRAINT `role_user_role_id_foreign` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `role_user_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
