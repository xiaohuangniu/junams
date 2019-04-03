/*
Navicat MySQL Data Transfer

Source Server         : 新极资源
Source Server Version : 50643
Source Host           : 39.108.174.125:3306
Source Database       : junams

Target Server Type    : MYSQL
Target Server Version : 50643
File Encoding         : 65001

Date: 2019-04-01 14:43:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for jun_area
-- ----------------------------
DROP TABLE IF EXISTS `jun_area`;
CREATE TABLE `jun_area` (
  `r_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `r_pid` int(10) NOT NULL COMMENT '市级ID',
  `r_name` varchar(50) NOT NULL DEFAULT '' COMMENT '地区名称',
  `r_code` varchar(10) NOT NULL DEFAULT '' COMMENT '地区code代码',
  `r_type` tinyint(1) DEFAULT '3' COMMENT '城市级别',
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5653 DEFAULT CHARSET=utf8 COMMENT='区级表';

-- ----------------------------
-- Records of jun_area
-- ----------------------------
INSERT INTO `jun_area` VALUES ('2584', '138', '长安区', '130102', '3');
INSERT INTO `jun_area` VALUES ('2586', '138', '桥西区', '130104', '3');
INSERT INTO `jun_area` VALUES ('2587', '138', '新华区', '130105', '3');
INSERT INTO `jun_area` VALUES ('2588', '138', '井陉矿区', '130107', '3');
INSERT INTO `jun_area` VALUES ('2589', '138', '裕华区', '130108', '3');
INSERT INTO `jun_area` VALUES ('2590', '138', '井陉县', '130121', '3');
INSERT INTO `jun_area` VALUES ('2591', '138', '正定县', '130123', '3');
INSERT INTO `jun_area` VALUES ('2592', '138', '栾城区', '130111', '3');
INSERT INTO `jun_area` VALUES ('2593', '138', '行唐县', '130125', '3');
INSERT INTO `jun_area` VALUES ('2594', '138', '灵寿县', '130126', '3');
INSERT INTO `jun_area` VALUES ('2595', '138', '高邑县', '130127', '3');
INSERT INTO `jun_area` VALUES ('2596', '138', '深泽县', '130128', '3');
INSERT INTO `jun_area` VALUES ('2597', '138', '赞皇县', '130129', '3');
INSERT INTO `jun_area` VALUES ('2598', '138', '无极县', '130130', '3');
INSERT INTO `jun_area` VALUES ('2599', '138', '平山县', '130131', '3');
INSERT INTO `jun_area` VALUES ('2600', '138', '元氏县', '130132', '3');
INSERT INTO `jun_area` VALUES ('2601', '138', '赵县', '130133', '3');
INSERT INTO `jun_area` VALUES ('2603', '138', '藁城区', '130109', '3');
INSERT INTO `jun_area` VALUES ('2604', '138', '晋州市', '130183', '3');
INSERT INTO `jun_area` VALUES ('2605', '138', '新乐市', '130184', '3');
INSERT INTO `jun_area` VALUES ('2606', '138', '鹿泉区', '130110', '3');
INSERT INTO `jun_area` VALUES ('2607', '146', '路南区', '130202', '3');
INSERT INTO `jun_area` VALUES ('2608', '146', '路北区', '130203', '3');
INSERT INTO `jun_area` VALUES ('2609', '146', '古冶区', '130204', '3');
INSERT INTO `jun_area` VALUES ('2610', '146', '开平区', '130205', '3');
INSERT INTO `jun_area` VALUES ('2611', '146', '丰南区', '130207', '3');
INSERT INTO `jun_area` VALUES ('2612', '146', '丰润区', '130208', '3');
INSERT INTO `jun_area` VALUES ('2613', '146', '滦县', '130223', '3');
INSERT INTO `jun_area` VALUES ('2614', '146', '滦南县', '130224', '3');
INSERT INTO `jun_area` VALUES ('2615', '146', '乐亭县', '130225', '3');
INSERT INTO `jun_area` VALUES ('2616', '146', '迁西县', '130227', '3');
INSERT INTO `jun_area` VALUES ('2617', '146', '玉田县', '130229', '3');
INSERT INTO `jun_area` VALUES ('2619', '146', '遵化市', '130281', '3');
INSERT INTO `jun_area` VALUES ('2620', '146', '迁安市', '130283', '3');
INSERT INTO `jun_area` VALUES ('2621', '145', '海港区', '130302', '3');
INSERT INTO `jun_area` VALUES ('2622', '145', '山海关区', '130303', '3');
INSERT INTO `jun_area` VALUES ('2623', '145', '北戴河区', '130304', '3');
INSERT INTO `jun_area` VALUES ('2624', '145', '青龙满族自治县', '130321', '3');
INSERT INTO `jun_area` VALUES ('2625', '145', '昌黎县', '130322', '3');
INSERT INTO `jun_area` VALUES ('2626', '145', '抚宁区', '130306', '3');
INSERT INTO `jun_area` VALUES ('2627', '145', '卢龙县', '130324', '3');
INSERT INTO `jun_area` VALUES ('2628', '142', '邯山区', '130402', '3');
INSERT INTO `jun_area` VALUES ('2629', '142', '丛台区', '130403', '3');
INSERT INTO `jun_area` VALUES ('2630', '142', '复兴区', '130404', '3');
INSERT INTO `jun_area` VALUES ('2631', '142', '峰峰矿区', '130406', '3');
INSERT INTO `jun_area` VALUES ('2632', '142', '邯郸县', '130421', '3');
INSERT INTO `jun_area` VALUES ('2633', '142', '临漳县', '130423', '3');
INSERT INTO `jun_area` VALUES ('2634', '142', '成安县', '130424', '3');
INSERT INTO `jun_area` VALUES ('2635', '142', '大名县', '130425', '3');
INSERT INTO `jun_area` VALUES ('2636', '142', '涉县', '130426', '3');
INSERT INTO `jun_area` VALUES ('2637', '142', '磁县', '130427', '3');
INSERT INTO `jun_area` VALUES ('2638', '142', '肥乡县', '130428', '3');
INSERT INTO `jun_area` VALUES ('2639', '142', '永年县', '130429', '3');
INSERT INTO `jun_area` VALUES ('2640', '142', '邱县', '130430', '3');
INSERT INTO `jun_area` VALUES ('2641', '142', '鸡泽县', '130431', '3');
INSERT INTO `jun_area` VALUES ('2642', '142', '广平县', '130432', '3');
INSERT INTO `jun_area` VALUES ('2643', '142', '馆陶县', '130433', '3');
INSERT INTO `jun_area` VALUES ('2644', '142', '魏县', '130434', '3');
INSERT INTO `jun_area` VALUES ('2645', '142', '曲周县', '130435', '3');
INSERT INTO `jun_area` VALUES ('2646', '142', '武安市', '130481', '3');
INSERT INTO `jun_area` VALUES ('2647', '147', '桥东区', '130502', '3');
INSERT INTO `jun_area` VALUES ('2648', '147', '桥西区', '130503', '3');
INSERT INTO `jun_area` VALUES ('2649', '147', '邢台县', '130521', '3');
INSERT INTO `jun_area` VALUES ('2650', '147', '临城县', '130522', '3');
INSERT INTO `jun_area` VALUES ('2651', '147', '内丘县', '130523', '3');
INSERT INTO `jun_area` VALUES ('2652', '147', '柏乡县', '130524', '3');
INSERT INTO `jun_area` VALUES ('2653', '147', '隆尧县', '130525', '3');
INSERT INTO `jun_area` VALUES ('2654', '147', '任县', '130526', '3');
INSERT INTO `jun_area` VALUES ('2655', '147', '南和县', '130527', '3');
INSERT INTO `jun_area` VALUES ('2656', '147', '宁晋县', '130528', '3');
INSERT INTO `jun_area` VALUES ('2657', '147', '巨鹿县', '130529', '3');
INSERT INTO `jun_area` VALUES ('2658', '147', '新河县', '130530', '3');
INSERT INTO `jun_area` VALUES ('2659', '147', '广宗县', '130531', '3');
INSERT INTO `jun_area` VALUES ('2660', '147', '平乡县', '130532', '3');
INSERT INTO `jun_area` VALUES ('2661', '147', '威县', '130533', '3');
INSERT INTO `jun_area` VALUES ('2662', '147', '清河县', '130534', '3');
INSERT INTO `jun_area` VALUES ('2663', '147', '临西县', '130535', '3');
INSERT INTO `jun_area` VALUES ('2664', '147', '南宫市', '130581', '3');
INSERT INTO `jun_area` VALUES ('2665', '147', '沙河市', '130582', '3');
INSERT INTO `jun_area` VALUES ('2669', '139', '满城区', '130607', '3');
INSERT INTO `jun_area` VALUES ('2670', '139', '清苑区', '130608', '3');
INSERT INTO `jun_area` VALUES ('2671', '139', '涞水县', '130623', '3');
INSERT INTO `jun_area` VALUES ('2672', '139', '阜平县', '130624', '3');
INSERT INTO `jun_area` VALUES ('2673', '139', '徐水区', '130609', '3');
INSERT INTO `jun_area` VALUES ('2674', '139', '定兴县', '130626', '3');
INSERT INTO `jun_area` VALUES ('2675', '139', '唐县', '130627', '3');
INSERT INTO `jun_area` VALUES ('2676', '139', '高阳县', '130628', '3');
INSERT INTO `jun_area` VALUES ('2677', '139', '容城县', '130629', '3');
INSERT INTO `jun_area` VALUES ('2678', '139', '涞源县', '130630', '3');
INSERT INTO `jun_area` VALUES ('2679', '139', '望都县', '130631', '3');
INSERT INTO `jun_area` VALUES ('2680', '139', '安新县', '130632', '3');
INSERT INTO `jun_area` VALUES ('2681', '139', '易县', '130633', '3');
INSERT INTO `jun_area` VALUES ('2682', '139', '曲阳县', '130634', '3');
INSERT INTO `jun_area` VALUES ('2683', '139', '蠡县', '130635', '3');
INSERT INTO `jun_area` VALUES ('2684', '139', '顺平县', '130636', '3');
INSERT INTO `jun_area` VALUES ('2685', '139', '博野县', '130637', '3');
INSERT INTO `jun_area` VALUES ('2686', '139', '雄县', '130638', '3');
INSERT INTO `jun_area` VALUES ('2687', '139', '涿州市', '130681', '3');
INSERT INTO `jun_area` VALUES ('2689', '139', '安国市', '130683', '3');
INSERT INTO `jun_area` VALUES ('2690', '139', '高碑店市', '130684', '3');
INSERT INTO `jun_area` VALUES ('2691', '148', '桥东区', '130702', '3');
INSERT INTO `jun_area` VALUES ('2692', '148', '桥西区', '130703', '3');
INSERT INTO `jun_area` VALUES ('2693', '148', '宣化区', '130705', '3');
INSERT INTO `jun_area` VALUES ('2694', '148', '下花园区', '130706', '3');
INSERT INTO `jun_area` VALUES ('2695', '148', '宣化县', '130721', '3');
INSERT INTO `jun_area` VALUES ('2696', '148', '张北县', '130722', '3');
INSERT INTO `jun_area` VALUES ('2697', '148', '康保县', '130723', '3');
INSERT INTO `jun_area` VALUES ('2698', '148', '沽源县', '130724', '3');
INSERT INTO `jun_area` VALUES ('2699', '148', '尚义县', '130725', '3');
INSERT INTO `jun_area` VALUES ('2700', '148', '蔚县', '130726', '3');
INSERT INTO `jun_area` VALUES ('2701', '148', '阳原县', '130727', '3');
INSERT INTO `jun_area` VALUES ('2702', '148', '怀安县', '130728', '3');
INSERT INTO `jun_area` VALUES ('2703', '148', '万全县', '130729', '3');
INSERT INTO `jun_area` VALUES ('2704', '148', '怀来县', '130730', '3');
INSERT INTO `jun_area` VALUES ('2705', '148', '涿鹿县', '130731', '3');
INSERT INTO `jun_area` VALUES ('2706', '148', '赤城县', '130732', '3');
INSERT INTO `jun_area` VALUES ('2707', '148', '崇礼县', '130733', '3');
INSERT INTO `jun_area` VALUES ('2708', '141', '双桥区', '130802', '3');
INSERT INTO `jun_area` VALUES ('2709', '141', '双滦区', '130803', '3');
INSERT INTO `jun_area` VALUES ('2710', '141', '鹰手营子矿区', '130804', '3');
INSERT INTO `jun_area` VALUES ('2711', '141', '承德县', '130821', '3');
INSERT INTO `jun_area` VALUES ('2712', '141', '兴隆县', '130822', '3');
INSERT INTO `jun_area` VALUES ('2713', '141', '平泉县', '130823', '3');
INSERT INTO `jun_area` VALUES ('2714', '141', '滦平县', '130824', '3');
INSERT INTO `jun_area` VALUES ('2715', '141', '隆化县', '130825', '3');
INSERT INTO `jun_area` VALUES ('2716', '141', '丰宁满族自治县', '130826', '3');
INSERT INTO `jun_area` VALUES ('2717', '141', '宽城满族自治县', '130827', '3');
INSERT INTO `jun_area` VALUES ('2718', '141', '围场满族蒙古族自治县', '130828', '3');
INSERT INTO `jun_area` VALUES ('2719', '140', '新华区', '130902', '3');
INSERT INTO `jun_area` VALUES ('2720', '140', '运河区', '130903', '3');
INSERT INTO `jun_area` VALUES ('2721', '140', '沧县', '130921', '3');
INSERT INTO `jun_area` VALUES ('2722', '140', '青县', '130922', '3');
INSERT INTO `jun_area` VALUES ('2723', '140', '东光县', '130923', '3');
INSERT INTO `jun_area` VALUES ('2724', '140', '海兴县', '130924', '3');
INSERT INTO `jun_area` VALUES ('2725', '140', '盐山县', '130925', '3');
INSERT INTO `jun_area` VALUES ('2726', '140', '肃宁县', '130926', '3');
INSERT INTO `jun_area` VALUES ('2727', '140', '南皮县', '130927', '3');
INSERT INTO `jun_area` VALUES ('2728', '140', '吴桥县', '130928', '3');
INSERT INTO `jun_area` VALUES ('2729', '140', '献县', '130929', '3');
INSERT INTO `jun_area` VALUES ('2730', '140', '孟村回族自治县', '130930', '3');
INSERT INTO `jun_area` VALUES ('2731', '140', '泊头市', '130981', '3');
INSERT INTO `jun_area` VALUES ('2732', '140', '任丘市', '130982', '3');
INSERT INTO `jun_area` VALUES ('2733', '140', '黄骅市', '130983', '3');
INSERT INTO `jun_area` VALUES ('2734', '140', '河间市', '130984', '3');
INSERT INTO `jun_area` VALUES ('2735', '144', '安次区', '131002', '3');
INSERT INTO `jun_area` VALUES ('2736', '144', '广阳区', '131003', '3');
INSERT INTO `jun_area` VALUES ('2737', '144', '固安县', '131022', '3');
INSERT INTO `jun_area` VALUES ('2738', '144', '永清县', '131023', '3');
INSERT INTO `jun_area` VALUES ('2739', '144', '香河县', '131024', '3');
INSERT INTO `jun_area` VALUES ('2740', '144', '大城县', '131025', '3');
INSERT INTO `jun_area` VALUES ('2741', '144', '文安县', '131026', '3');
INSERT INTO `jun_area` VALUES ('2742', '144', '大厂回族自治县', '131028', '3');
INSERT INTO `jun_area` VALUES ('2743', '144', '霸州市', '131081', '3');
INSERT INTO `jun_area` VALUES ('2744', '144', '三河市', '131082', '3');
INSERT INTO `jun_area` VALUES ('2745', '143', '桃城区', '131102', '3');
INSERT INTO `jun_area` VALUES ('2746', '143', '枣强县', '131121', '3');
INSERT INTO `jun_area` VALUES ('2747', '143', '武邑县', '131122', '3');
INSERT INTO `jun_area` VALUES ('2748', '143', '武强县', '131123', '3');
INSERT INTO `jun_area` VALUES ('2749', '143', '饶阳县', '131124', '3');
INSERT INTO `jun_area` VALUES ('2750', '143', '安平县', '131125', '3');
INSERT INTO `jun_area` VALUES ('2751', '143', '故城县', '131126', '3');
INSERT INTO `jun_area` VALUES ('2752', '143', '景县', '131127', '3');
INSERT INTO `jun_area` VALUES ('2753', '143', '阜城县', '131128', '3');
INSERT INTO `jun_area` VALUES ('2754', '143', '冀州市', '131181', '3');
INSERT INTO `jun_area` VALUES ('2755', '143', '深州市', '131182', '3');
INSERT INTO `jun_area` VALUES ('2756', '300', '小店区', '140105', '3');
INSERT INTO `jun_area` VALUES ('2757', '300', '迎泽区', '140106', '3');
INSERT INTO `jun_area` VALUES ('2758', '300', '杏花岭区', '140107', '3');
INSERT INTO `jun_area` VALUES ('2759', '300', '尖草坪区', '140108', '3');
INSERT INTO `jun_area` VALUES ('2760', '300', '万柏林区', '140109', '3');
INSERT INTO `jun_area` VALUES ('2761', '300', '晋源区', '140110', '3');
INSERT INTO `jun_area` VALUES ('2762', '300', '清徐县', '140121', '3');
INSERT INTO `jun_area` VALUES ('2763', '300', '阳曲县', '140122', '3');
INSERT INTO `jun_area` VALUES ('2764', '300', '娄烦县', '140123', '3');
INSERT INTO `jun_area` VALUES ('2765', '300', '古交市', '140181', '3');
INSERT INTO `jun_area` VALUES ('2766', '302', '城区', '140202', '3');
INSERT INTO `jun_area` VALUES ('2767', '302', '矿区', '140203', '3');
INSERT INTO `jun_area` VALUES ('2768', '302', '南郊区', '140211', '3');
INSERT INTO `jun_area` VALUES ('2769', '302', '新荣区', '140212', '3');
INSERT INTO `jun_area` VALUES ('2770', '302', '阳高县', '140221', '3');
INSERT INTO `jun_area` VALUES ('2771', '302', '天镇县', '140222', '3');
INSERT INTO `jun_area` VALUES ('2772', '302', '广灵县', '140223', '3');
INSERT INTO `jun_area` VALUES ('2773', '302', '灵丘县', '140224', '3');
INSERT INTO `jun_area` VALUES ('2774', '302', '浑源县', '140225', '3');
INSERT INTO `jun_area` VALUES ('2775', '302', '左云县', '140226', '3');
INSERT INTO `jun_area` VALUES ('2776', '302', '大同县', '140227', '3');
INSERT INTO `jun_area` VALUES ('2777', '309', '城区', '140302', '3');
INSERT INTO `jun_area` VALUES ('2778', '309', '矿区', '140303', '3');
INSERT INTO `jun_area` VALUES ('2779', '309', '郊区', '140311', '3');
INSERT INTO `jun_area` VALUES ('2780', '309', '平定县', '140321', '3');
INSERT INTO `jun_area` VALUES ('2781', '309', '盂县', '140322', '3');
INSERT INTO `jun_area` VALUES ('2782', '301', '城区', '140402', '3');
INSERT INTO `jun_area` VALUES ('2783', '301', '郊区', '140411', '3');
INSERT INTO `jun_area` VALUES ('2784', '301', '长治县', '140421', '3');
INSERT INTO `jun_area` VALUES ('2785', '301', '襄垣县', '140423', '3');
INSERT INTO `jun_area` VALUES ('2786', '301', '屯留县', '140424', '3');
INSERT INTO `jun_area` VALUES ('2787', '301', '平顺县', '140425', '3');
INSERT INTO `jun_area` VALUES ('2788', '301', '黎城县', '140426', '3');
INSERT INTO `jun_area` VALUES ('2789', '301', '壶关县', '140427', '3');
INSERT INTO `jun_area` VALUES ('2790', '301', '长子县', '140428', '3');
INSERT INTO `jun_area` VALUES ('2791', '301', '武乡县', '140429', '3');
INSERT INTO `jun_area` VALUES ('2792', '301', '沁县', '140430', '3');
INSERT INTO `jun_area` VALUES ('2793', '301', '沁源县', '140431', '3');
INSERT INTO `jun_area` VALUES ('2794', '301', '潞城市', '140481', '3');
INSERT INTO `jun_area` VALUES ('2795', '303', '城区', '140502', '3');
INSERT INTO `jun_area` VALUES ('2796', '303', '沁水县', '140521', '3');
INSERT INTO `jun_area` VALUES ('2797', '303', '阳城县', '140522', '3');
INSERT INTO `jun_area` VALUES ('2798', '303', '陵川县', '140524', '3');
INSERT INTO `jun_area` VALUES ('2799', '303', '泽州县', '140525', '3');
INSERT INTO `jun_area` VALUES ('2800', '303', '高平市', '140581', '3');
INSERT INTO `jun_area` VALUES ('2801', '307', '朔城区', '140602', '3');
INSERT INTO `jun_area` VALUES ('2802', '307', '平鲁区', '140603', '3');
INSERT INTO `jun_area` VALUES ('2803', '307', '山阴县', '140621', '3');
INSERT INTO `jun_area` VALUES ('2804', '307', '应县', '140622', '3');
INSERT INTO `jun_area` VALUES ('2805', '307', '右玉县', '140623', '3');
INSERT INTO `jun_area` VALUES ('2806', '307', '怀仁县', '140624', '3');
INSERT INTO `jun_area` VALUES ('2807', '304', '榆次区', '140702', '3');
INSERT INTO `jun_area` VALUES ('2808', '304', '榆社县', '140721', '3');
INSERT INTO `jun_area` VALUES ('2809', '304', '左权县', '140722', '3');
INSERT INTO `jun_area` VALUES ('2810', '304', '和顺县', '140723', '3');
INSERT INTO `jun_area` VALUES ('2811', '304', '昔阳县', '140724', '3');
INSERT INTO `jun_area` VALUES ('2812', '304', '寿阳县', '140725', '3');
INSERT INTO `jun_area` VALUES ('2813', '304', '太谷县', '140726', '3');
INSERT INTO `jun_area` VALUES ('2814', '304', '祁县', '140727', '3');
INSERT INTO `jun_area` VALUES ('2815', '304', '平遥县', '140728', '3');
INSERT INTO `jun_area` VALUES ('2816', '304', '灵石县', '140729', '3');
INSERT INTO `jun_area` VALUES ('2817', '304', '介休市', '140781', '3');
INSERT INTO `jun_area` VALUES ('2818', '310', '盐湖区', '140802', '3');
INSERT INTO `jun_area` VALUES ('2819', '310', '临猗县', '140821', '3');
INSERT INTO `jun_area` VALUES ('2820', '310', '万荣县', '140822', '3');
INSERT INTO `jun_area` VALUES ('2821', '310', '闻喜县', '140823', '3');
INSERT INTO `jun_area` VALUES ('2822', '310', '稷山县', '140824', '3');
INSERT INTO `jun_area` VALUES ('2823', '310', '新绛县', '140825', '3');
INSERT INTO `jun_area` VALUES ('2824', '310', '绛县', '140826', '3');
INSERT INTO `jun_area` VALUES ('2825', '310', '垣曲县', '140827', '3');
INSERT INTO `jun_area` VALUES ('2826', '310', '夏县', '140828', '3');
INSERT INTO `jun_area` VALUES ('2827', '310', '平陆县', '140829', '3');
INSERT INTO `jun_area` VALUES ('2828', '310', '芮城县', '140830', '3');
INSERT INTO `jun_area` VALUES ('2829', '310', '永济市', '140881', '3');
INSERT INTO `jun_area` VALUES ('2830', '310', '河津市', '140882', '3');
INSERT INTO `jun_area` VALUES ('2831', '308', '忻府区', '140902', '3');
INSERT INTO `jun_area` VALUES ('2832', '308', '定襄县', '140921', '3');
INSERT INTO `jun_area` VALUES ('2833', '308', '五台县', '140922', '3');
INSERT INTO `jun_area` VALUES ('2834', '308', '代县', '140923', '3');
INSERT INTO `jun_area` VALUES ('2835', '308', '繁峙县', '140924', '3');
INSERT INTO `jun_area` VALUES ('2836', '308', '宁武县', '140925', '3');
INSERT INTO `jun_area` VALUES ('2837', '308', '静乐县', '140926', '3');
INSERT INTO `jun_area` VALUES ('2838', '308', '神池县', '140927', '3');
INSERT INTO `jun_area` VALUES ('2839', '308', '五寨县', '140928', '3');
INSERT INTO `jun_area` VALUES ('2840', '308', '岢岚县', '140929', '3');
INSERT INTO `jun_area` VALUES ('2841', '308', '河曲县', '140930', '3');
INSERT INTO `jun_area` VALUES ('2842', '308', '保德县', '140931', '3');
INSERT INTO `jun_area` VALUES ('2843', '308', '偏关县', '140932', '3');
INSERT INTO `jun_area` VALUES ('2844', '308', '原平市', '140981', '3');
INSERT INTO `jun_area` VALUES ('2845', '305', '尧都区', '141002', '3');
INSERT INTO `jun_area` VALUES ('2846', '305', '曲沃县', '141021', '3');
INSERT INTO `jun_area` VALUES ('2847', '305', '翼城县', '141022', '3');
INSERT INTO `jun_area` VALUES ('2848', '305', '襄汾县', '141023', '3');
INSERT INTO `jun_area` VALUES ('2849', '305', '洪洞县', '141024', '3');
INSERT INTO `jun_area` VALUES ('2850', '305', '古县', '141025', '3');
INSERT INTO `jun_area` VALUES ('2851', '305', '安泽县', '141026', '3');
INSERT INTO `jun_area` VALUES ('2852', '305', '浮山县', '141027', '3');
INSERT INTO `jun_area` VALUES ('2853', '305', '吉县', '141028', '3');
INSERT INTO `jun_area` VALUES ('2854', '305', '乡宁县', '141029', '3');
INSERT INTO `jun_area` VALUES ('2855', '305', '大宁县', '141030', '3');
INSERT INTO `jun_area` VALUES ('2856', '305', '隰县', '141031', '3');
INSERT INTO `jun_area` VALUES ('2857', '305', '永和县', '141032', '3');
INSERT INTO `jun_area` VALUES ('2858', '305', '蒲县', '141033', '3');
INSERT INTO `jun_area` VALUES ('2859', '305', '汾西县', '141034', '3');
INSERT INTO `jun_area` VALUES ('2860', '305', '侯马市', '141081', '3');
INSERT INTO `jun_area` VALUES ('2861', '305', '霍州市', '141082', '3');
INSERT INTO `jun_area` VALUES ('2862', '306', '离石区', '141102', '3');
INSERT INTO `jun_area` VALUES ('2863', '306', '文水县', '141121', '3');
INSERT INTO `jun_area` VALUES ('2864', '306', '交城县', '141122', '3');
INSERT INTO `jun_area` VALUES ('2865', '306', '兴县', '141123', '3');
INSERT INTO `jun_area` VALUES ('2866', '306', '临县', '141124', '3');
INSERT INTO `jun_area` VALUES ('2867', '306', '柳林县', '141125', '3');
INSERT INTO `jun_area` VALUES ('2868', '306', '石楼县', '141126', '3');
INSERT INTO `jun_area` VALUES ('2869', '306', '岚县', '141127', '3');
INSERT INTO `jun_area` VALUES ('2870', '306', '方山县', '141128', '3');
INSERT INTO `jun_area` VALUES ('2871', '306', '中阳县', '141129', '3');
INSERT INTO `jun_area` VALUES ('2872', '306', '交口县', '141130', '3');
INSERT INTO `jun_area` VALUES ('2873', '306', '孝义市', '141181', '3');
INSERT INTO `jun_area` VALUES ('2874', '306', '汾阳市', '141182', '3');
INSERT INTO `jun_area` VALUES ('2875', '258', '新城区', '150102', '3');
INSERT INTO `jun_area` VALUES ('2876', '258', '回民区', '150103', '3');
INSERT INTO `jun_area` VALUES ('2877', '258', '玉泉区', '150104', '3');
INSERT INTO `jun_area` VALUES ('2878', '258', '赛罕区', '150105', '3');
INSERT INTO `jun_area` VALUES ('2879', '258', '土默特左旗', '150121', '3');
INSERT INTO `jun_area` VALUES ('2880', '258', '托克托县', '150122', '3');
INSERT INTO `jun_area` VALUES ('2881', '258', '和林格尔县', '150123', '3');
INSERT INTO `jun_area` VALUES ('2882', '258', '清水河县', '150124', '3');
INSERT INTO `jun_area` VALUES ('2883', '258', '武川县', '150125', '3');
INSERT INTO `jun_area` VALUES ('2884', '261', '东河区', '150202', '3');
INSERT INTO `jun_area` VALUES ('2885', '261', '昆都仑区', '150203', '3');
INSERT INTO `jun_area` VALUES ('2886', '261', '青山区', '150204', '3');
INSERT INTO `jun_area` VALUES ('2887', '261', '石拐区', '150205', '3');
INSERT INTO `jun_area` VALUES ('2888', '261', '白云鄂博矿区', '150206', '3');
INSERT INTO `jun_area` VALUES ('2889', '261', '九原区', '150207', '3');
INSERT INTO `jun_area` VALUES ('2890', '261', '土默特右旗', '150221', '3');
INSERT INTO `jun_area` VALUES ('2891', '261', '固阳县', '150222', '3');
INSERT INTO `jun_area` VALUES ('2892', '261', '达尔罕茂明安联合旗', '150223', '3');
INSERT INTO `jun_area` VALUES ('2893', '266', '海勃湾区', '150302', '3');
INSERT INTO `jun_area` VALUES ('2894', '266', '海南区', '150303', '3');
INSERT INTO `jun_area` VALUES ('2895', '266', '乌达区', '150304', '3');
INSERT INTO `jun_area` VALUES ('2896', '262', '红山区', '150402', '3');
INSERT INTO `jun_area` VALUES ('2897', '262', '元宝山区', '150403', '3');
INSERT INTO `jun_area` VALUES ('2898', '262', '松山区', '150404', '3');
INSERT INTO `jun_area` VALUES ('2899', '262', '阿鲁科尔沁旗', '150421', '3');
INSERT INTO `jun_area` VALUES ('2900', '262', '巴林左旗', '150423', '3');
INSERT INTO `jun_area` VALUES ('2901', '262', '巴林右旗', '150423', '3');
INSERT INTO `jun_area` VALUES ('2902', '262', '林西县', '150424', '3');
INSERT INTO `jun_area` VALUES ('2903', '262', '克什克腾旗', '150425', '3');
INSERT INTO `jun_area` VALUES ('2904', '262', '翁牛特旗', '150426', '3');
INSERT INTO `jun_area` VALUES ('2905', '262', '喀喇沁旗', '150428', '3');
INSERT INTO `jun_area` VALUES ('2906', '262', '宁城县', '150429', '3');
INSERT INTO `jun_area` VALUES ('2907', '262', '敖汉旗', '150430', '3');
INSERT INTO `jun_area` VALUES ('2908', '265', '科尔沁区', '150502', '3');
INSERT INTO `jun_area` VALUES ('2909', '265', '科尔沁左翼中旗', '150521', '3');
INSERT INTO `jun_area` VALUES ('2910', '265', '科尔沁左翼后旗', '150522', '3');
INSERT INTO `jun_area` VALUES ('2911', '265', '开鲁县', '150523', '3');
INSERT INTO `jun_area` VALUES ('2912', '265', '库伦旗', '150524', '3');
INSERT INTO `jun_area` VALUES ('2913', '265', '奈曼旗', '150525', '3');
INSERT INTO `jun_area` VALUES ('2914', '265', '扎鲁特旗', '150526', '3');
INSERT INTO `jun_area` VALUES ('2915', '265', '霍林郭勒市', '150581', '3');
INSERT INTO `jun_area` VALUES ('2916', '263', '东胜区', '150602', '3');
INSERT INTO `jun_area` VALUES ('2917', '263', '达拉特旗', '150621', '3');
INSERT INTO `jun_area` VALUES ('2918', '263', '准格尔旗', '150622', '3');
INSERT INTO `jun_area` VALUES ('2919', '263', '鄂托克前旗', '150623', '3');
INSERT INTO `jun_area` VALUES ('2920', '263', '鄂托克旗', '150624', '3');
INSERT INTO `jun_area` VALUES ('2921', '263', '杭锦旗', '150625', '3');
INSERT INTO `jun_area` VALUES ('2922', '263', '乌审旗', '150626', '3');
INSERT INTO `jun_area` VALUES ('2923', '263', '伊金霍洛旗', '150627', '3');
INSERT INTO `jun_area` VALUES ('2924', '264', '海拉尔区', '150702', '3');
INSERT INTO `jun_area` VALUES ('2925', '264', '阿荣旗', '150721', '3');
INSERT INTO `jun_area` VALUES ('2926', '264', '莫力达瓦达斡尔族自治旗', '150722', '3');
INSERT INTO `jun_area` VALUES ('2927', '264', '鄂伦春自治旗', '150723', '3');
INSERT INTO `jun_area` VALUES ('2928', '264', '鄂温克族自治旗', '150724', '3');
INSERT INTO `jun_area` VALUES ('2929', '264', '陈巴尔虎旗', '150725', '3');
INSERT INTO `jun_area` VALUES ('2930', '264', '新巴尔虎左旗', '150726', '3');
INSERT INTO `jun_area` VALUES ('2931', '264', '新巴尔虎右旗', '150727', '3');
INSERT INTO `jun_area` VALUES ('2932', '264', '满洲里市', '150781', '3');
INSERT INTO `jun_area` VALUES ('2933', '264', '牙克石市', '150782', '3');
INSERT INTO `jun_area` VALUES ('2934', '264', '扎兰屯市', '150783', '3');
INSERT INTO `jun_area` VALUES ('2935', '264', '额尔古纳市', '150784', '3');
INSERT INTO `jun_area` VALUES ('2936', '264', '根河市', '150785', '3');
INSERT INTO `jun_area` VALUES ('2937', '244', '和平区', '210102', '3');
INSERT INTO `jun_area` VALUES ('2938', '244', '沈河区', '210103', '3');
INSERT INTO `jun_area` VALUES ('2939', '244', '大东区', '210104', '3');
INSERT INTO `jun_area` VALUES ('2940', '244', '皇姑区', '210105', '3');
INSERT INTO `jun_area` VALUES ('2941', '244', '铁西区', '210106', '3');
INSERT INTO `jun_area` VALUES ('2942', '244', '苏家屯区', '210111', '3');
INSERT INTO `jun_area` VALUES ('2943', '244', '浑南区', '210112', '3');
INSERT INTO `jun_area` VALUES ('2944', '244', '沈北新区', '210113', '3');
INSERT INTO `jun_area` VALUES ('2945', '244', '于洪区', '210114', '3');
INSERT INTO `jun_area` VALUES ('2946', '244', '辽中县', '210122', '3');
INSERT INTO `jun_area` VALUES ('2947', '244', '康平县', '210123', '3');
INSERT INTO `jun_area` VALUES ('2948', '244', '法库县', '210124', '3');
INSERT INTO `jun_area` VALUES ('2949', '244', '新民市', '210181', '3');
INSERT INTO `jun_area` VALUES ('2950', '245', '中山区', '210202', '3');
INSERT INTO `jun_area` VALUES ('2951', '245', '西岗区', '210203', '3');
INSERT INTO `jun_area` VALUES ('2952', '245', '沙河口区', '210204', '3');
INSERT INTO `jun_area` VALUES ('2953', '245', '甘井子区', '210211', '3');
INSERT INTO `jun_area` VALUES ('2954', '245', '旅顺口区', '210212', '3');
INSERT INTO `jun_area` VALUES ('2955', '245', '金州区', '210213', '3');
INSERT INTO `jun_area` VALUES ('2956', '245', '长海县', '210224', '3');
INSERT INTO `jun_area` VALUES ('2957', '245', '瓦房店市', '210281', '3');
INSERT INTO `jun_area` VALUES ('2958', '245', '普兰店市', '210282', '3');
INSERT INTO `jun_area` VALUES ('2959', '245', '庄河市', '210283', '3');
INSERT INTO `jun_area` VALUES ('2960', '246', '铁东区', '210302', '3');
INSERT INTO `jun_area` VALUES ('2961', '246', '铁西区', '210303', '3');
INSERT INTO `jun_area` VALUES ('2962', '246', '立山区', '210304', '3');
INSERT INTO `jun_area` VALUES ('2963', '246', '千山区', '210311', '3');
INSERT INTO `jun_area` VALUES ('2964', '246', '台安县', '210321', '3');
INSERT INTO `jun_area` VALUES ('2965', '246', '岫岩满族自治县', '210323', '3');
INSERT INTO `jun_area` VALUES ('2966', '246', '海城市', '210381', '3');
INSERT INTO `jun_area` VALUES ('2967', '250', '新抚区', '210402', '3');
INSERT INTO `jun_area` VALUES ('2968', '250', '东洲区', '210403', '3');
INSERT INTO `jun_area` VALUES ('2969', '250', '望花区', '210404', '3');
INSERT INTO `jun_area` VALUES ('2970', '250', '顺城区', '210411', '3');
INSERT INTO `jun_area` VALUES ('2971', '250', '抚顺县', '210421', '3');
INSERT INTO `jun_area` VALUES ('2972', '250', '新宾满族自治县', '210422', '3');
INSERT INTO `jun_area` VALUES ('2973', '250', '清原满族自治县', '210423', '3');
INSERT INTO `jun_area` VALUES ('2974', '247', '平山区', '210502', '3');
INSERT INTO `jun_area` VALUES ('2975', '247', '溪湖区', '210503', '3');
INSERT INTO `jun_area` VALUES ('2976', '247', '明山区', '210504', '3');
INSERT INTO `jun_area` VALUES ('2977', '247', '南芬区', '210505', '3');
INSERT INTO `jun_area` VALUES ('2978', '247', '本溪满族自治县', '210521', '3');
INSERT INTO `jun_area` VALUES ('2979', '247', '桓仁满族自治县', '210522', '3');
INSERT INTO `jun_area` VALUES ('2980', '249', '元宝区', '210602', '3');
INSERT INTO `jun_area` VALUES ('2981', '249', '振兴区', '210603', '3');
INSERT INTO `jun_area` VALUES ('2982', '249', '振安区', '210604', '3');
INSERT INTO `jun_area` VALUES ('2983', '249', '宽甸满族自治县', '210624', '3');
INSERT INTO `jun_area` VALUES ('2984', '249', '东港市', '210681', '3');
INSERT INTO `jun_area` VALUES ('2985', '249', '凤城市', '210682', '3');
INSERT INTO `jun_area` VALUES ('2986', '253', '古塔区', '210702', '3');
INSERT INTO `jun_area` VALUES ('2987', '253', '凌河区', '210703', '3');
INSERT INTO `jun_area` VALUES ('2988', '253', '太和区', '210711', '3');
INSERT INTO `jun_area` VALUES ('2989', '253', '黑山县', '210726', '3');
INSERT INTO `jun_area` VALUES ('2990', '253', '义县', '210727', '3');
INSERT INTO `jun_area` VALUES ('2991', '253', '凌海市', '210781', '3');
INSERT INTO `jun_area` VALUES ('2992', '253', '北镇市', '210782', '3');
INSERT INTO `jun_area` VALUES ('2993', '257', '站前区', '210802', '3');
INSERT INTO `jun_area` VALUES ('2994', '257', '西市区', '210803', '3');
INSERT INTO `jun_area` VALUES ('2995', '257', '鲅鱼圈区', '210804', '3');
INSERT INTO `jun_area` VALUES ('2996', '257', '老边区', '210811', '3');
INSERT INTO `jun_area` VALUES ('2997', '257', '盖州市', '210881', '3');
INSERT INTO `jun_area` VALUES ('2998', '257', '大石桥市', '210882', '3');
INSERT INTO `jun_area` VALUES ('2999', '251', '海州区', '210902', '3');
INSERT INTO `jun_area` VALUES ('3000', '251', '新邱区', '210903', '3');
INSERT INTO `jun_area` VALUES ('3001', '251', '太平区', '210904', '3');
INSERT INTO `jun_area` VALUES ('3002', '251', '清河门区', '210905', '3');
INSERT INTO `jun_area` VALUES ('3003', '251', '细河区', '210911', '3');
INSERT INTO `jun_area` VALUES ('3004', '251', '阜新蒙古族自治县', '210921', '3');
INSERT INTO `jun_area` VALUES ('3005', '251', '彰武县', '210922', '3');
INSERT INTO `jun_area` VALUES ('3006', '254', '白塔区', '211002', '3');
INSERT INTO `jun_area` VALUES ('3007', '254', '文圣区', '211003', '3');
INSERT INTO `jun_area` VALUES ('3008', '254', '宏伟区', '211004', '3');
INSERT INTO `jun_area` VALUES ('3009', '254', '弓长岭区', '211005', '3');
INSERT INTO `jun_area` VALUES ('3010', '254', '太子河区', '211011', '3');
INSERT INTO `jun_area` VALUES ('3011', '254', '辽阳县', '211021', '3');
INSERT INTO `jun_area` VALUES ('3012', '254', '灯塔市', '211081', '3');
INSERT INTO `jun_area` VALUES ('3013', '255', '双台子区', '211102', '3');
INSERT INTO `jun_area` VALUES ('3014', '255', '兴隆台区', '211103', '3');
INSERT INTO `jun_area` VALUES ('3015', '255', '大洼县', '211121', '3');
INSERT INTO `jun_area` VALUES ('3016', '255', '盘山县', '211122', '3');
INSERT INTO `jun_area` VALUES ('3017', '256', '银州区', '211202', '3');
INSERT INTO `jun_area` VALUES ('3018', '256', '清河区', '211204', '3');
INSERT INTO `jun_area` VALUES ('3019', '256', '铁岭县', '211221', '3');
INSERT INTO `jun_area` VALUES ('3020', '256', '西丰县', '211223', '3');
INSERT INTO `jun_area` VALUES ('3021', '256', '昌图县', '211224', '3');
INSERT INTO `jun_area` VALUES ('3022', '256', '调兵山市', '211281', '3');
INSERT INTO `jun_area` VALUES ('3023', '256', '开原市', '211282', '3');
INSERT INTO `jun_area` VALUES ('3024', '248', '双塔区', '211302', '3');
INSERT INTO `jun_area` VALUES ('3025', '248', '龙城区', '211303', '3');
INSERT INTO `jun_area` VALUES ('3026', '248', '朝阳县', '211321', '3');
INSERT INTO `jun_area` VALUES ('3027', '248', '建平县', '211322', '3');
INSERT INTO `jun_area` VALUES ('3028', '248', '喀喇沁左翼蒙古族自治县', '211324', '3');
INSERT INTO `jun_area` VALUES ('3029', '248', '北票市', '211381', '3');
INSERT INTO `jun_area` VALUES ('3030', '248', '凌源市', '211382', '3');
INSERT INTO `jun_area` VALUES ('3031', '252', '连山区', '211402', '3');
INSERT INTO `jun_area` VALUES ('3032', '252', '龙港区', '211403', '3');
INSERT INTO `jun_area` VALUES ('3033', '252', '南票区', '211404', '3');
INSERT INTO `jun_area` VALUES ('3034', '252', '绥中县', '211421', '3');
INSERT INTO `jun_area` VALUES ('3035', '252', '建昌县', '211422', '3');
INSERT INTO `jun_area` VALUES ('3036', '252', '兴城市', '211481', '3');
INSERT INTO `jun_area` VALUES ('3037', '211', '南关区', '220102', '3');
INSERT INTO `jun_area` VALUES ('3038', '211', '宽城区', '220103', '3');
INSERT INTO `jun_area` VALUES ('3039', '211', '朝阳区', '220104', '3');
INSERT INTO `jun_area` VALUES ('3040', '211', '二道区', '220105', '3');
INSERT INTO `jun_area` VALUES ('3041', '211', '绿园区', '220106', '3');
INSERT INTO `jun_area` VALUES ('3042', '211', '双阳区', '220112', '3');
INSERT INTO `jun_area` VALUES ('3043', '211', '农安县', '220122', '3');
INSERT INTO `jun_area` VALUES ('3044', '211', '九台区', '220113', '3');
INSERT INTO `jun_area` VALUES ('3045', '211', '榆树市', '220182', '3');
INSERT INTO `jun_area` VALUES ('3046', '211', '德惠市', '220183', '3');
INSERT INTO `jun_area` VALUES ('3047', '15', '昌邑区', '220202', '3');
INSERT INTO `jun_area` VALUES ('3048', '15', '龙潭区', '220203', '3');
INSERT INTO `jun_area` VALUES ('3049', '15', '船营区', '220204', '3');
INSERT INTO `jun_area` VALUES ('3050', '15', '丰满区', '220211', '3');
INSERT INTO `jun_area` VALUES ('3051', '15', '永吉县', '220221', '3');
INSERT INTO `jun_area` VALUES ('3052', '15', '蛟河市', '220281', '3');
INSERT INTO `jun_area` VALUES ('3053', '15', '桦甸市', '220282', '3');
INSERT INTO `jun_area` VALUES ('3054', '15', '舒兰市', '220283', '3');
INSERT INTO `jun_area` VALUES ('3055', '15', '磐石市', '220284', '3');
INSERT INTO `jun_area` VALUES ('3056', '216', '铁西区', '220302', '3');
INSERT INTO `jun_area` VALUES ('3057', '216', '铁东区', '220303', '3');
INSERT INTO `jun_area` VALUES ('3058', '216', '梨树县', '220322', '3');
INSERT INTO `jun_area` VALUES ('3059', '216', '伊通满族自治县', '220323', '3');
INSERT INTO `jun_area` VALUES ('3060', '216', '公主岭市', '220381', '3');
INSERT INTO `jun_area` VALUES ('3061', '216', '双辽市', '220382', '3');
INSERT INTO `jun_area` VALUES ('3062', '215', '龙山区', '220402', '3');
INSERT INTO `jun_area` VALUES ('3063', '215', '西安区', '220403', '3');
INSERT INTO `jun_area` VALUES ('3064', '215', '东丰县', '220421', '3');
INSERT INTO `jun_area` VALUES ('3065', '215', '东辽县', '220422', '3');
INSERT INTO `jun_area` VALUES ('3066', '218', '东昌区', '220502', '3');
INSERT INTO `jun_area` VALUES ('3067', '218', '二道江区', '220503', '3');
INSERT INTO `jun_area` VALUES ('3068', '218', '通化县', '220521', '3');
INSERT INTO `jun_area` VALUES ('3069', '218', '辉南县', '220523', '3');
INSERT INTO `jun_area` VALUES ('3070', '218', '柳河县', '220524', '3');
INSERT INTO `jun_area` VALUES ('3071', '218', '梅河口市', '220581', '3');
INSERT INTO `jun_area` VALUES ('3072', '218', '集安市', '220582', '3');
INSERT INTO `jun_area` VALUES ('3073', '214', '浑江区', '220602', '3');
INSERT INTO `jun_area` VALUES ('3074', '214', '江源区', '220605', '3');
INSERT INTO `jun_area` VALUES ('3075', '214', '抚松县', '220621', '3');
INSERT INTO `jun_area` VALUES ('3076', '214', '靖宇县', '220622', '3');
INSERT INTO `jun_area` VALUES ('3077', '214', '长白朝鲜族自治县', '220623', '3');
INSERT INTO `jun_area` VALUES ('3078', '214', '临江市', '220681', '3');
INSERT INTO `jun_area` VALUES ('3079', '217', '宁江区', '220702', '3');
INSERT INTO `jun_area` VALUES ('3080', '217', '前郭尔罗斯蒙古族自治县', '220721', '3');
INSERT INTO `jun_area` VALUES ('3081', '217', '长岭县', '220722', '3');
INSERT INTO `jun_area` VALUES ('3082', '217', '乾安县', '220723', '3');
INSERT INTO `jun_area` VALUES ('3083', '217', '扶余市', '220781', '3');
INSERT INTO `jun_area` VALUES ('3084', '213', '洮北区', '220802', '3');
INSERT INTO `jun_area` VALUES ('3085', '213', '镇赉县', '220821', '3');
INSERT INTO `jun_area` VALUES ('3086', '213', '通榆县', '220822', '3');
INSERT INTO `jun_area` VALUES ('3087', '213', '洮南市', '220881', '3');
INSERT INTO `jun_area` VALUES ('3088', '213', '大安市', '220882', '3');
INSERT INTO `jun_area` VALUES ('3089', '167', '道里区', '230102', '3');
INSERT INTO `jun_area` VALUES ('3090', '167', '南岗区', '230103', '3');
INSERT INTO `jun_area` VALUES ('3091', '167', '道外区', '230104', '3');
INSERT INTO `jun_area` VALUES ('3092', '167', '平房区', '230108', '3');
INSERT INTO `jun_area` VALUES ('3093', '167', '松北区', '230109', '3');
INSERT INTO `jun_area` VALUES ('3094', '167', '香坊区', '230110', '3');
INSERT INTO `jun_area` VALUES ('3095', '167', '呼兰区', '230111', '3');
INSERT INTO `jun_area` VALUES ('3096', '167', '阿城区', '230112', '3');
INSERT INTO `jun_area` VALUES ('3097', '167', '依兰县', '230123', '3');
INSERT INTO `jun_area` VALUES ('3098', '167', '方正县', '230124', '3');
INSERT INTO `jun_area` VALUES ('3099', '167', '宾县', '230125', '3');
INSERT INTO `jun_area` VALUES ('3100', '167', '巴彦县', '230126', '3');
INSERT INTO `jun_area` VALUES ('3101', '167', '木兰县', '230127', '3');
INSERT INTO `jun_area` VALUES ('3102', '167', '通河县', '230128', '3');
INSERT INTO `jun_area` VALUES ('3103', '167', '延寿县', '230129', '3');
INSERT INTO `jun_area` VALUES ('3104', '167', '双城区', '230113', '3');
INSERT INTO `jun_area` VALUES ('3105', '167', '尚志市', '230183', '3');
INSERT INTO `jun_area` VALUES ('3106', '167', '五常市', '230184', '3');
INSERT INTO `jun_area` VALUES ('3107', '176', '龙沙区', '230202', '3');
INSERT INTO `jun_area` VALUES ('3108', '176', '建华区', '230203', '3');
INSERT INTO `jun_area` VALUES ('3109', '176', '铁锋区', '230204', '3');
INSERT INTO `jun_area` VALUES ('3110', '176', '昂昂溪区', '230205', '3');
INSERT INTO `jun_area` VALUES ('3111', '176', '富拉尔基区', '230206', '3');
INSERT INTO `jun_area` VALUES ('3112', '176', '碾子山区', '230207', '3');
INSERT INTO `jun_area` VALUES ('3113', '176', '梅里斯达斡尔族区', '230208', '3');
INSERT INTO `jun_area` VALUES ('3114', '176', '龙江县', '230221', '3');
INSERT INTO `jun_area` VALUES ('3115', '176', '依安县', '230223', '3');
INSERT INTO `jun_area` VALUES ('3116', '176', '泰来县', '230224', '3');
INSERT INTO `jun_area` VALUES ('3117', '176', '甘南县', '230225', '3');
INSERT INTO `jun_area` VALUES ('3118', '176', '富裕县', '230227', '3');
INSERT INTO `jun_area` VALUES ('3119', '176', '克山县', '230229', '3');
INSERT INTO `jun_area` VALUES ('3120', '176', '克东县', '230230', '3');
INSERT INTO `jun_area` VALUES ('3121', '176', '拜泉县', '230231', '3');
INSERT INTO `jun_area` VALUES ('3122', '176', '讷河市', '230281', '3');
INSERT INTO `jun_area` VALUES ('3123', '172', '鸡冠区', '230302', '3');
INSERT INTO `jun_area` VALUES ('3124', '172', '恒山区', '230303', '3');
INSERT INTO `jun_area` VALUES ('3125', '172', '滴道区', '230304', '3');
INSERT INTO `jun_area` VALUES ('3126', '172', '梨树区', '230305', '3');
INSERT INTO `jun_area` VALUES ('3127', '172', '城子河区', '230306', '3');
INSERT INTO `jun_area` VALUES ('3128', '172', '麻山区', '230307', '3');
INSERT INTO `jun_area` VALUES ('3129', '172', '鸡东县', '230321', '3');
INSERT INTO `jun_area` VALUES ('3130', '172', '虎林市', '230381', '3');
INSERT INTO `jun_area` VALUES ('3131', '172', '密山市', '230382', '3');
INSERT INTO `jun_area` VALUES ('3132', '170', '向阳区', '230402', '3');
INSERT INTO `jun_area` VALUES ('3133', '170', '工农区', '230403', '3');
INSERT INTO `jun_area` VALUES ('3134', '170', '南山区', '230404', '3');
INSERT INTO `jun_area` VALUES ('3135', '170', '兴安区', '230405', '3');
INSERT INTO `jun_area` VALUES ('3136', '170', '东山区', '230406', '3');
INSERT INTO `jun_area` VALUES ('3137', '170', '兴山区', '230407', '3');
INSERT INTO `jun_area` VALUES ('3138', '170', '萝北县', '230421', '3');
INSERT INTO `jun_area` VALUES ('3139', '170', '绥滨县', '230422', '3');
INSERT INTO `jun_area` VALUES ('3140', '177', '尖山区', '230502', '3');
INSERT INTO `jun_area` VALUES ('3141', '177', '岭东区', '230503', '3');
INSERT INTO `jun_area` VALUES ('3142', '177', '四方台区', '230505', '3');
INSERT INTO `jun_area` VALUES ('3143', '177', '宝山区', '230506', '3');
INSERT INTO `jun_area` VALUES ('3144', '177', '集贤县', '230521', '3');
INSERT INTO `jun_area` VALUES ('3145', '177', '友谊县', '230522', '3');
INSERT INTO `jun_area` VALUES ('3146', '177', '宝清县', '230523', '3');
INSERT INTO `jun_area` VALUES ('3147', '177', '饶河县', '230524', '3');
INSERT INTO `jun_area` VALUES ('3148', '168', '萨尔图区', '230602', '3');
INSERT INTO `jun_area` VALUES ('3149', '168', '龙凤区', '230603', '3');
INSERT INTO `jun_area` VALUES ('3150', '168', '让胡路区', '230604', '3');
INSERT INTO `jun_area` VALUES ('3151', '168', '红岗区', '230605', '3');
INSERT INTO `jun_area` VALUES ('3152', '168', '大同区', '230606', '3');
INSERT INTO `jun_area` VALUES ('3153', '168', '肇州县', '230621', '3');
INSERT INTO `jun_area` VALUES ('3154', '168', '肇源县', '230622', '3');
INSERT INTO `jun_area` VALUES ('3155', '168', '林甸县', '230623', '3');
INSERT INTO `jun_area` VALUES ('3156', '168', '杜尔伯特蒙古族自治县', '230624', '3');
INSERT INTO `jun_area` VALUES ('3157', '179', '伊春区', '230702', '3');
INSERT INTO `jun_area` VALUES ('3158', '179', '南岔区', '230703', '3');
INSERT INTO `jun_area` VALUES ('3159', '179', '友好区', '230704', '3');
INSERT INTO `jun_area` VALUES ('3160', '179', '西林区', '230705', '3');
INSERT INTO `jun_area` VALUES ('3161', '179', '翠峦区', '230706', '3');
INSERT INTO `jun_area` VALUES ('3162', '179', '新青区', '230707', '3');
INSERT INTO `jun_area` VALUES ('3163', '179', '美溪区', '230708', '3');
INSERT INTO `jun_area` VALUES ('3164', '179', '金山屯区', '230709', '3');
INSERT INTO `jun_area` VALUES ('3165', '179', '五营区', '230710', '3');
INSERT INTO `jun_area` VALUES ('3166', '179', '乌马河区', '230711', '3');
INSERT INTO `jun_area` VALUES ('3167', '179', '汤旺河区', '230712', '3');
INSERT INTO `jun_area` VALUES ('3168', '179', '带岭区', '230713', '3');
INSERT INTO `jun_area` VALUES ('3169', '179', '乌伊岭区', '230714', '3');
INSERT INTO `jun_area` VALUES ('3170', '179', '红星区', '230715', '3');
INSERT INTO `jun_area` VALUES ('3171', '179', '上甘岭区', '230716', '3');
INSERT INTO `jun_area` VALUES ('3172', '179', '嘉荫县', '230722', '3');
INSERT INTO `jun_area` VALUES ('3173', '179', '铁力市', '230781', '3');
INSERT INTO `jun_area` VALUES ('3174', '173', '向阳区', '230803', '3');
INSERT INTO `jun_area` VALUES ('3175', '173', '前进区', '230804', '3');
INSERT INTO `jun_area` VALUES ('3176', '173', '东风区', '230805', '3');
INSERT INTO `jun_area` VALUES ('3177', '173', '郊区', '230811', '3');
INSERT INTO `jun_area` VALUES ('3178', '173', '桦南县', '230822', '3');
INSERT INTO `jun_area` VALUES ('3179', '173', '桦川县', '230826', '3');
INSERT INTO `jun_area` VALUES ('3180', '173', '汤原县', '230828', '3');
INSERT INTO `jun_area` VALUES ('3181', '173', '抚远县', '230833', '3');
INSERT INTO `jun_area` VALUES ('3182', '173', '同江市', '230881', '3');
INSERT INTO `jun_area` VALUES ('3183', '173', '富锦市', '230882', '3');
INSERT INTO `jun_area` VALUES ('3184', '175', '新兴区', '230902', '3');
INSERT INTO `jun_area` VALUES ('3185', '175', '桃山区', '230903', '3');
INSERT INTO `jun_area` VALUES ('3186', '175', '茄子河区', '230904', '3');
INSERT INTO `jun_area` VALUES ('3187', '175', '勃利县', '230921', '3');
INSERT INTO `jun_area` VALUES ('3188', '174', '东安区', '231002', '3');
INSERT INTO `jun_area` VALUES ('3189', '174', '阳明区', '231003', '3');
INSERT INTO `jun_area` VALUES ('3190', '174', '爱民区', '231004', '3');
INSERT INTO `jun_area` VALUES ('3191', '174', '西安区', '231005', '3');
INSERT INTO `jun_area` VALUES ('3192', '174', '东宁县', '231024', '3');
INSERT INTO `jun_area` VALUES ('3193', '174', '林口县', '231025', '3');
INSERT INTO `jun_area` VALUES ('3194', '174', '绥芬河市', '231081', '3');
INSERT INTO `jun_area` VALUES ('3195', '174', '海林市', '231083', '3');
INSERT INTO `jun_area` VALUES ('3196', '174', '宁安市', '231084', '3');
INSERT INTO `jun_area` VALUES ('3197', '174', '穆棱市', '231085', '3');
INSERT INTO `jun_area` VALUES ('3198', '171', '爱辉区', '231102', '3');
INSERT INTO `jun_area` VALUES ('3199', '171', '嫩江县', '231121', '3');
INSERT INTO `jun_area` VALUES ('3200', '171', '逊克县', '231123', '3');
INSERT INTO `jun_area` VALUES ('3201', '171', '孙吴县', '231124', '3');
INSERT INTO `jun_area` VALUES ('3202', '171', '北安市', '231181', '3');
INSERT INTO `jun_area` VALUES ('3203', '171', '五大连池市', '231182', '3');
INSERT INTO `jun_area` VALUES ('3204', '178', '北林区', '231202', '3');
INSERT INTO `jun_area` VALUES ('3205', '178', '望奎县', '231221', '3');
INSERT INTO `jun_area` VALUES ('3206', '178', '兰西县', '231222', '3');
INSERT INTO `jun_area` VALUES ('3207', '178', '青冈县', '231223', '3');
INSERT INTO `jun_area` VALUES ('3208', '178', '庆安县', '231224', '3');
INSERT INTO `jun_area` VALUES ('3209', '178', '明水县', '231225', '3');
INSERT INTO `jun_area` VALUES ('3210', '178', '绥棱县', '231226', '3');
INSERT INTO `jun_area` VALUES ('3211', '178', '安达市', '231281', '3');
INSERT INTO `jun_area` VALUES ('3212', '178', '肇东市', '231282', '3');
INSERT INTO `jun_area` VALUES ('3213', '178', '海伦市', '231283', '3');
INSERT INTO `jun_area` VALUES ('3214', '220', '玄武区', '320102', '3');
INSERT INTO `jun_area` VALUES ('5353', '369', '镇沅彝族哈尼族拉祜族自治县', '530825', '3');
INSERT INTO `jun_area` VALUES ('3216', '220', '秦淮区', '320104', '3');
INSERT INTO `jun_area` VALUES ('3217', '220', '建邺区', '320105', '3');
INSERT INTO `jun_area` VALUES ('3218', '220', '鼓楼区', '320106', '3');
INSERT INTO `jun_area` VALUES ('3220', '220', '浦口区', '320111', '3');
INSERT INTO `jun_area` VALUES ('3221', '220', '栖霞区', '320113', '3');
INSERT INTO `jun_area` VALUES ('3222', '220', '雨花台区', '320114', '3');
INSERT INTO `jun_area` VALUES ('3223', '220', '江宁区', '320115', '3');
INSERT INTO `jun_area` VALUES ('3224', '220', '六合区', '320116', '3');
INSERT INTO `jun_area` VALUES ('3225', '220', '溧水区', '320117', '3');
INSERT INTO `jun_area` VALUES ('3226', '220', '高淳区', '320118', '3');
INSERT INTO `jun_area` VALUES ('3227', '222', '崇安区', '320202', '3');
INSERT INTO `jun_area` VALUES ('3228', '222', '南长区', '320203', '3');
INSERT INTO `jun_area` VALUES ('3229', '222', '北塘区', '320204', '3');
INSERT INTO `jun_area` VALUES ('3230', '222', '锡山区', '320205', '3');
INSERT INTO `jun_area` VALUES ('3231', '222', '惠山区', '320206', '3');
INSERT INTO `jun_area` VALUES ('3232', '222', '滨湖区', '320211', '3');
INSERT INTO `jun_area` VALUES ('3233', '222', '江阴市', '320281', '3');
INSERT INTO `jun_area` VALUES ('3234', '222', '宜兴市', '320282', '3');
INSERT INTO `jun_area` VALUES ('3235', '229', '鼓楼区', '320302', '3');
INSERT INTO `jun_area` VALUES ('3236', '229', '云龙区', '320303', '3');
INSERT INTO `jun_area` VALUES ('5352', '369', '景谷傣族彝族自治县', '530824', '3');
INSERT INTO `jun_area` VALUES ('3238', '229', '贾汪区', '320305', '3');
INSERT INTO `jun_area` VALUES ('3239', '229', '泉山区', '320311', '3');
INSERT INTO `jun_area` VALUES ('3240', '229', '丰县', '320321', '3');
INSERT INTO `jun_area` VALUES ('3241', '229', '沛县', '320322', '3');
INSERT INTO `jun_area` VALUES ('3242', '229', '铜山区', '320312', '3');
INSERT INTO `jun_area` VALUES ('3243', '229', '睢宁县', '320324', '3');
INSERT INTO `jun_area` VALUES ('3244', '229', '新沂市', '320381', '3');
INSERT INTO `jun_area` VALUES ('3245', '229', '邳州市', '320382', '3');
INSERT INTO `jun_area` VALUES ('3246', '223', '天宁区', '320402', '3');
INSERT INTO `jun_area` VALUES ('3247', '223', '钟楼区', '320404', '3');
INSERT INTO `jun_area` VALUES ('3249', '223', '新北区', '320411', '3');
INSERT INTO `jun_area` VALUES ('3250', '223', '武进区', '320412', '3');
INSERT INTO `jun_area` VALUES ('3251', '223', '溧阳市', '320481', '3');
INSERT INTO `jun_area` VALUES ('3252', '223', '金坛区', '320413', '3');
INSERT INTO `jun_area` VALUES ('3256', '221', '虎丘区', '320505', '3');
INSERT INTO `jun_area` VALUES ('3257', '221', '吴中区', '320506', '3');
INSERT INTO `jun_area` VALUES ('3258', '221', '相城区', '320507', '3');
INSERT INTO `jun_area` VALUES ('3259', '221', '常熟市', '320581', '3');
INSERT INTO `jun_area` VALUES ('3260', '221', '张家港市', '320582', '3');
INSERT INTO `jun_area` VALUES ('3261', '221', '昆山市', '320583', '3');
INSERT INTO `jun_area` VALUES ('3262', '221', '吴江市', '320584', '3');
INSERT INTO `jun_area` VALUES ('3263', '221', '太仓市', '320585', '3');
INSERT INTO `jun_area` VALUES ('3264', '226', '崇川区', '320602', '3');
INSERT INTO `jun_area` VALUES ('3265', '226', '港闸区', '320611', '3');
INSERT INTO `jun_area` VALUES ('3266', '226', '海安县', '320621', '3');
INSERT INTO `jun_area` VALUES ('3267', '226', '如东县', '320623', '3');
INSERT INTO `jun_area` VALUES ('3268', '226', '启东市', '320681', '3');
INSERT INTO `jun_area` VALUES ('3269', '226', '如皋市', '320682', '3');
INSERT INTO `jun_area` VALUES ('3270', '226', '通州区', '320612', '3');
INSERT INTO `jun_area` VALUES ('3271', '226', '海门市', '320684', '3');
INSERT INTO `jun_area` VALUES ('3272', '225', '连云区', '320703', '3');
INSERT INTO `jun_area` VALUES ('3274', '225', '海州区', '320706', '3');
INSERT INTO `jun_area` VALUES ('3275', '225', '赣榆区', '320707', '3');
INSERT INTO `jun_area` VALUES ('3276', '225', '东海县', '320722', '3');
INSERT INTO `jun_area` VALUES ('3277', '225', '灌云县', '320723', '3');
INSERT INTO `jun_area` VALUES ('3278', '225', '灌南县', '320724', '3');
INSERT INTO `jun_area` VALUES ('3280', '224', '淮安区', '320803', '3');
INSERT INTO `jun_area` VALUES ('3281', '224', '淮阴区', '320804', '3');
INSERT INTO `jun_area` VALUES ('3282', '224', '清江浦区', '320811', '3');
INSERT INTO `jun_area` VALUES ('3283', '224', '涟水县', '320826', '3');
INSERT INTO `jun_area` VALUES ('3284', '224', '洪泽区', '320829', '3');
INSERT INTO `jun_area` VALUES ('3285', '224', '盱眙县', '320830', '3');
INSERT INTO `jun_area` VALUES ('3286', '224', '金湖县', '320831', '3');
INSERT INTO `jun_area` VALUES ('3287', '230', '亭湖区', '320902', '3');
INSERT INTO `jun_area` VALUES ('3288', '230', '盐都区', '320903', '3');
INSERT INTO `jun_area` VALUES ('3289', '230', '响水县', '320921', '3');
INSERT INTO `jun_area` VALUES ('3290', '230', '滨海县', '320922', '3');
INSERT INTO `jun_area` VALUES ('3291', '230', '阜宁县', '320923', '3');
INSERT INTO `jun_area` VALUES ('3292', '230', '射阳县', '320924', '3');
INSERT INTO `jun_area` VALUES ('3293', '230', '建湖县', '320925', '3');
INSERT INTO `jun_area` VALUES ('3294', '230', '东台市', '320981', '3');
INSERT INTO `jun_area` VALUES ('3295', '230', '大丰区', '320904', '3');
INSERT INTO `jun_area` VALUES ('3296', '231', '广陵区', '321002', '3');
INSERT INTO `jun_area` VALUES ('3297', '231', '邗江区', '321003', '3');
INSERT INTO `jun_area` VALUES ('3299', '231', '宝应县', '321023', '3');
INSERT INTO `jun_area` VALUES ('3300', '231', '仪征市', '321081', '3');
INSERT INTO `jun_area` VALUES ('3301', '231', '高邮市', '321084', '3');
INSERT INTO `jun_area` VALUES ('3302', '231', '江都区', '321012', '3');
INSERT INTO `jun_area` VALUES ('3303', '232', '京口区', '321102', '3');
INSERT INTO `jun_area` VALUES ('3304', '232', '润州区', '321111', '3');
INSERT INTO `jun_area` VALUES ('3305', '232', '丹徒区', '321112', '3');
INSERT INTO `jun_area` VALUES ('3306', '232', '丹阳市', '321181', '3');
INSERT INTO `jun_area` VALUES ('3307', '232', '扬中市', '321182', '3');
INSERT INTO `jun_area` VALUES ('3308', '232', '句容市', '321183', '3');
INSERT INTO `jun_area` VALUES ('3309', '228', '海陵区', '321202', '3');
INSERT INTO `jun_area` VALUES ('3310', '228', '高港区', '321203', '3');
INSERT INTO `jun_area` VALUES ('3311', '228', '兴化市', '321281', '3');
INSERT INTO `jun_area` VALUES ('3312', '228', '靖江市', '321282', '3');
INSERT INTO `jun_area` VALUES ('3313', '228', '泰兴市', '321283', '3');
INSERT INTO `jun_area` VALUES ('3314', '228', '姜堰区', '321204', '3');
INSERT INTO `jun_area` VALUES ('3315', '227', '宿城区', '321302', '3');
INSERT INTO `jun_area` VALUES ('3316', '227', '宿豫区', '321311', '3');
INSERT INTO `jun_area` VALUES ('3317', '227', '沭阳县', '321322', '3');
INSERT INTO `jun_area` VALUES ('3318', '227', '泗阳县', '321323', '3');
INSERT INTO `jun_area` VALUES ('3319', '227', '泗洪县', '321324', '3');
INSERT INTO `jun_area` VALUES ('3320', '383', '上城区', '330102', '3');
INSERT INTO `jun_area` VALUES ('3321', '383', '下城区', '330103', '3');
INSERT INTO `jun_area` VALUES ('3322', '383', '江干区', '330104', '3');
INSERT INTO `jun_area` VALUES ('3323', '383', '拱墅区', '330105', '3');
INSERT INTO `jun_area` VALUES ('3324', '383', '西湖区', '330106', '3');
INSERT INTO `jun_area` VALUES ('3325', '383', '滨江区', '330108', '3');
INSERT INTO `jun_area` VALUES ('3326', '383', '萧山区', '330109', '3');
INSERT INTO `jun_area` VALUES ('3327', '383', '余杭区', '330110', '3');
INSERT INTO `jun_area` VALUES ('3328', '383', '桐庐县', '330122', '3');
INSERT INTO `jun_area` VALUES ('3329', '383', '淳安县', '330127', '3');
INSERT INTO `jun_area` VALUES ('3330', '383', '建德市', '330182', '3');
INSERT INTO `jun_area` VALUES ('3331', '383', '富阳区', '330111', '3');
INSERT INTO `jun_area` VALUES ('3332', '383', '临安市', '330185', '3');
INSERT INTO `jun_area` VALUES ('3333', '388', '海曙区', '330203', '3');
INSERT INTO `jun_area` VALUES ('3334', '388', '江东区', '330204', '3');
INSERT INTO `jun_area` VALUES ('3335', '388', '江北区', '330205', '3');
INSERT INTO `jun_area` VALUES ('3336', '388', '北仑区', '330206', '3');
INSERT INTO `jun_area` VALUES ('3337', '388', '镇海区', '330211', '3');
INSERT INTO `jun_area` VALUES ('3338', '388', '鄞州区', '330212', '3');
INSERT INTO `jun_area` VALUES ('3339', '388', '象山县', '330225', '3');
INSERT INTO `jun_area` VALUES ('3340', '388', '宁海县', '330226', '3');
INSERT INTO `jun_area` VALUES ('3341', '388', '余姚市', '330281', '3');
INSERT INTO `jun_area` VALUES ('3342', '388', '慈溪市', '330282', '3');
INSERT INTO `jun_area` VALUES ('3343', '388', '奉化市', '330283', '3');
INSERT INTO `jun_area` VALUES ('3344', '391', '鹿城区', '330302', '3');
INSERT INTO `jun_area` VALUES ('3345', '391', '龙湾区', '330303', '3');
INSERT INTO `jun_area` VALUES ('3346', '391', '瓯海区', '330304', '3');
INSERT INTO `jun_area` VALUES ('3347', '391', '洞头区', '330305', '3');
INSERT INTO `jun_area` VALUES ('3348', '391', '永嘉县', '330324', '3');
INSERT INTO `jun_area` VALUES ('3349', '391', '平阳县', '330326', '3');
INSERT INTO `jun_area` VALUES ('3350', '391', '苍南县', '330327', '3');
INSERT INTO `jun_area` VALUES ('3351', '391', '文成县', '330328', '3');
INSERT INTO `jun_area` VALUES ('3352', '391', '泰顺县', '330329', '3');
INSERT INTO `jun_area` VALUES ('3353', '391', '瑞安市', '330381', '3');
INSERT INTO `jun_area` VALUES ('3354', '391', '乐清市', '330382', '3');
INSERT INTO `jun_area` VALUES ('3355', '385', '南湖区', '330402', '3');
INSERT INTO `jun_area` VALUES ('3356', '385', '秀洲区', '330411', '3');
INSERT INTO `jun_area` VALUES ('3357', '385', '嘉善县', '330421', '3');
INSERT INTO `jun_area` VALUES ('3358', '385', '海盐县', '330424', '3');
INSERT INTO `jun_area` VALUES ('3359', '385', '海宁市', '330481', '3');
INSERT INTO `jun_area` VALUES ('3360', '385', '平湖市', '330482', '3');
INSERT INTO `jun_area` VALUES ('3361', '385', '桐乡市', '330483', '3');
INSERT INTO `jun_area` VALUES ('3362', '384', '吴兴区', '330502', '3');
INSERT INTO `jun_area` VALUES ('3363', '384', '南浔区', '330503', '3');
INSERT INTO `jun_area` VALUES ('3364', '384', '德清县', '330521', '3');
INSERT INTO `jun_area` VALUES ('3365', '384', '长兴县', '330522', '3');
INSERT INTO `jun_area` VALUES ('3366', '384', '安吉县', '330523', '3');
INSERT INTO `jun_area` VALUES ('3367', '389', '越城区', '330602', '3');
INSERT INTO `jun_area` VALUES ('3368', '389', '柯桥区', '330603', '3');
INSERT INTO `jun_area` VALUES ('3369', '389', '新昌县', '330624', '3');
INSERT INTO `jun_area` VALUES ('3370', '389', '诸暨市', '330681', '3');
INSERT INTO `jun_area` VALUES ('3371', '389', '上虞区', '330604', '3');
INSERT INTO `jun_area` VALUES ('3372', '389', '嵊州市', '330683', '3');
INSERT INTO `jun_area` VALUES ('3373', '386', '婺城区', '330702', '3');
INSERT INTO `jun_area` VALUES ('3374', '386', '金东区', '330703', '3');
INSERT INTO `jun_area` VALUES ('3375', '386', '武义县', '330723', '3');
INSERT INTO `jun_area` VALUES ('3376', '386', '浦江县', '330726', '3');
INSERT INTO `jun_area` VALUES ('3377', '386', '磐安县', '330727', '3');
INSERT INTO `jun_area` VALUES ('3378', '386', '兰溪市', '330781', '3');
INSERT INTO `jun_area` VALUES ('3379', '386', '义乌市', '330782', '3');
INSERT INTO `jun_area` VALUES ('3380', '386', '东阳市', '330783', '3');
INSERT INTO `jun_area` VALUES ('3381', '386', '永康市', '330784', '3');
INSERT INTO `jun_area` VALUES ('3382', '393', '柯城区', '330802', '3');
INSERT INTO `jun_area` VALUES ('3383', '393', '衢江区', '330803', '3');
INSERT INTO `jun_area` VALUES ('3384', '393', '常山县', '330822', '3');
INSERT INTO `jun_area` VALUES ('3385', '393', '开化县', '330824', '3');
INSERT INTO `jun_area` VALUES ('3386', '393', '龙游县', '330825', '3');
INSERT INTO `jun_area` VALUES ('3387', '393', '江山市', '330881', '3');
INSERT INTO `jun_area` VALUES ('3388', '392', '定海区', '330902', '3');
INSERT INTO `jun_area` VALUES ('3389', '392', '普陀区', '330903', '3');
INSERT INTO `jun_area` VALUES ('3390', '392', '岱山县', '330921', '3');
INSERT INTO `jun_area` VALUES ('3391', '392', '嵊泗县', '330922', '3');
INSERT INTO `jun_area` VALUES ('3392', '390', '椒江区', '331002', '3');
INSERT INTO `jun_area` VALUES ('3393', '390', '黄岩区', '331003', '3');
INSERT INTO `jun_area` VALUES ('3394', '390', '路桥区', '331004', '3');
INSERT INTO `jun_area` VALUES ('3395', '390', '玉环县', '331021', '3');
INSERT INTO `jun_area` VALUES ('3396', '390', '三门县', '331022', '3');
INSERT INTO `jun_area` VALUES ('3397', '390', '天台县', '331023', '3');
INSERT INTO `jun_area` VALUES ('3398', '390', '仙居县', '331024', '3');
INSERT INTO `jun_area` VALUES ('3399', '390', '温岭市', '331081', '3');
INSERT INTO `jun_area` VALUES ('3400', '390', '临海市', '331082', '3');
INSERT INTO `jun_area` VALUES ('3401', '387', '莲都区', '331102', '3');
INSERT INTO `jun_area` VALUES ('3402', '387', '青田县', '331121', '3');
INSERT INTO `jun_area` VALUES ('3403', '387', '缙云县', '331122', '3');
INSERT INTO `jun_area` VALUES ('3404', '387', '遂昌县', '331123', '3');
INSERT INTO `jun_area` VALUES ('3405', '387', '松阳县', '331124', '3');
INSERT INTO `jun_area` VALUES ('3406', '387', '云和县', '331125', '3');
INSERT INTO `jun_area` VALUES ('3407', '387', '庆元县', '331126', '3');
INSERT INTO `jun_area` VALUES ('3408', '387', '景宁畲族自治县', '331127', '3');
INSERT INTO `jun_area` VALUES ('3409', '387', '龙泉市', '331181', '3');
INSERT INTO `jun_area` VALUES ('3410', '3401', '瑶海区', '340102', '3');
INSERT INTO `jun_area` VALUES ('3411', '3401', '庐阳区', '340103', '3');
INSERT INTO `jun_area` VALUES ('3412', '3401', '蜀山区', '340104', '3');
INSERT INTO `jun_area` VALUES ('3413', '3401', '包河区', '340111', '3');
INSERT INTO `jun_area` VALUES ('3414', '3401', '长丰县', '340121', '3');
INSERT INTO `jun_area` VALUES ('3415', '3401', '肥东县', '340122', '3');
INSERT INTO `jun_area` VALUES ('3416', '3401', '肥西县', '340123', '3');
INSERT INTO `jun_area` VALUES ('3417', '49', '镜湖区', '340202', '3');
INSERT INTO `jun_area` VALUES ('3418', '49', '弋江区', '340203', '3');
INSERT INTO `jun_area` VALUES ('3419', '49', '鸠江区', '340207', '3');
INSERT INTO `jun_area` VALUES ('3420', '49', '三山区', '340208', '3');
INSERT INTO `jun_area` VALUES ('3421', '49', '芜湖县', '340221', '3');
INSERT INTO `jun_area` VALUES ('3422', '49', '繁昌县', '340222', '3');
INSERT INTO `jun_area` VALUES ('3423', '49', '南陵县', '340223', '3');
INSERT INTO `jun_area` VALUES ('3424', '37', '龙子湖区', '340302', '3');
INSERT INTO `jun_area` VALUES ('3425', '37', '蚌山区', '340303', '3');
INSERT INTO `jun_area` VALUES ('3426', '37', '禹会区', '340304', '3');
INSERT INTO `jun_area` VALUES ('3427', '37', '淮上区', '340311', '3');
INSERT INTO `jun_area` VALUES ('3428', '37', '怀远县', '340321', '3');
INSERT INTO `jun_area` VALUES ('3429', '37', '五河县', '340322', '3');
INSERT INTO `jun_area` VALUES ('3430', '37', '固镇县', '340323', '3');
INSERT INTO `jun_area` VALUES ('3431', '43', '大通区', '340402', '3');
INSERT INTO `jun_area` VALUES ('3432', '43', '田家庵区', '340403', '3');
INSERT INTO `jun_area` VALUES ('3433', '43', '谢家集区', '340404', '3');
INSERT INTO `jun_area` VALUES ('3435', '43', '潘集区', '340406', '3');
INSERT INTO `jun_area` VALUES ('3436', '43', '凤台县', '340421', '3');
INSERT INTO `jun_area` VALUES ('5351', '369', '景东彝族自治县', '530823', '3');
INSERT INTO `jun_area` VALUES ('3438', '46', '花山区', '340503', '3');
INSERT INTO `jun_area` VALUES ('3439', '46', '雨山区', '340504', '3');
INSERT INTO `jun_area` VALUES ('3440', '46', '当涂县', '340521', '3');
INSERT INTO `jun_area` VALUES ('3441', '42', '杜集区', '340602', '3');
INSERT INTO `jun_area` VALUES ('3442', '42', '相山区', '340603', '3');
INSERT INTO `jun_area` VALUES ('3443', '42', '烈山区', '340604', '3');
INSERT INTO `jun_area` VALUES ('3444', '42', '濉溪县', '340621', '3');
INSERT INTO `jun_area` VALUES ('3445', '48', '铜官山区', '340702', '3');
INSERT INTO `jun_area` VALUES ('3446', '48', '狮子山区', '340703', '3');
INSERT INTO `jun_area` VALUES ('3447', '48', '郊区', '340711', '3');
INSERT INTO `jun_area` VALUES ('3448', '48', '铜陵县', '340721', '3');
INSERT INTO `jun_area` VALUES ('3449', '36', '迎江区', '340802', '3');
INSERT INTO `jun_area` VALUES ('3450', '36', '大观区', '340803', '3');
INSERT INTO `jun_area` VALUES ('3451', '36', '宜秀区', '340811', '3');
INSERT INTO `jun_area` VALUES ('3452', '36', '怀宁县', '340822', '3');
INSERT INTO `jun_area` VALUES ('3453', '36', '枞阳县', '340823', '3');
INSERT INTO `jun_area` VALUES ('3454', '36', '潜山县', '340824', '3');
INSERT INTO `jun_area` VALUES ('3455', '36', '太湖县', '340825', '3');
INSERT INTO `jun_area` VALUES ('3456', '36', '宿松县', '340826', '3');
INSERT INTO `jun_area` VALUES ('3457', '36', '望江县', '340827', '3');
INSERT INTO `jun_area` VALUES ('3458', '36', '岳西县', '340828', '3');
INSERT INTO `jun_area` VALUES ('3459', '36', '桐城市', '340881', '3');
INSERT INTO `jun_area` VALUES ('3460', '44', '屯溪区', '341002', '3');
INSERT INTO `jun_area` VALUES ('3461', '44', '黄山区', '341003', '3');
INSERT INTO `jun_area` VALUES ('3462', '44', '徽州区', '341004', '3');
INSERT INTO `jun_area` VALUES ('3463', '44', '歙县', '341021', '3');
INSERT INTO `jun_area` VALUES ('3464', '44', '休宁县', '341022', '3');
INSERT INTO `jun_area` VALUES ('3465', '44', '黟县', '341023', '3');
INSERT INTO `jun_area` VALUES ('3466', '44', '祁门县', '341024', '3');
INSERT INTO `jun_area` VALUES ('3467', '40', '琅琊区', '341102', '3');
INSERT INTO `jun_area` VALUES ('3468', '40', '南谯区', '341103', '3');
INSERT INTO `jun_area` VALUES ('3469', '40', '来安县', '341122', '3');
INSERT INTO `jun_area` VALUES ('3470', '40', '全椒县', '341124', '3');
INSERT INTO `jun_area` VALUES ('3471', '40', '定远县', '341125', '3');
INSERT INTO `jun_area` VALUES ('3472', '40', '凤阳县', '341126', '3');
INSERT INTO `jun_area` VALUES ('3473', '40', '天长市', '341181', '3');
INSERT INTO `jun_area` VALUES ('3474', '40', '明光市', '341182', '3');
INSERT INTO `jun_area` VALUES ('3475', '41', '颍州区', '341202', '3');
INSERT INTO `jun_area` VALUES ('3476', '41', '颍东区', '341203', '3');
INSERT INTO `jun_area` VALUES ('3477', '41', '颍泉区', '341204', '3');
INSERT INTO `jun_area` VALUES ('3478', '41', '临泉县', '341221', '3');
INSERT INTO `jun_area` VALUES ('3479', '41', '太和县', '341222', '3');
INSERT INTO `jun_area` VALUES ('3480', '41', '阜南县', '341225', '3');
INSERT INTO `jun_area` VALUES ('3481', '41', '颍上县', '341226', '3');
INSERT INTO `jun_area` VALUES ('3482', '41', '界首市', '341282', '3');
INSERT INTO `jun_area` VALUES ('3483', '47', '埇桥区', '341302', '3');
INSERT INTO `jun_area` VALUES ('3484', '47', '砀山县', '341321', '3');
INSERT INTO `jun_area` VALUES ('3485', '47', '萧县', '341322', '3');
INSERT INTO `jun_area` VALUES ('3486', '47', '灵璧县', '341323', '3');
INSERT INTO `jun_area` VALUES ('3487', '47', '泗县', '341324', '3');
INSERT INTO `jun_area` VALUES ('3488', '38', '居巢区', '341402', '3');
INSERT INTO `jun_area` VALUES ('3489', '38', '庐江县', '341421', '3');
INSERT INTO `jun_area` VALUES ('3490', '38', '无为县', '341422', '3');
INSERT INTO `jun_area` VALUES ('3491', '38', '含山县', '341423', '3');
INSERT INTO `jun_area` VALUES ('3492', '38', '和县', '341424', '3');
INSERT INTO `jun_area` VALUES ('3493', '45', '金安区', '341502', '3');
INSERT INTO `jun_area` VALUES ('3494', '45', '裕安区', '341503', '3');
INSERT INTO `jun_area` VALUES ('3495', '45', '寿县', '341521', '3');
INSERT INTO `jun_area` VALUES ('3496', '45', '霍邱县', '341522', '3');
INSERT INTO `jun_area` VALUES ('3497', '45', '舒城县', '341523', '3');
INSERT INTO `jun_area` VALUES ('3498', '45', '金寨县', '341524', '3');
INSERT INTO `jun_area` VALUES ('3499', '45', '霍山县', '341525', '3');
INSERT INTO `jun_area` VALUES ('3500', '51', '谯城区', '341602', '3');
INSERT INTO `jun_area` VALUES ('3501', '51', '涡阳县', '341621', '3');
INSERT INTO `jun_area` VALUES ('3502', '51', '蒙城县', '341622', '3');
INSERT INTO `jun_area` VALUES ('3503', '51', '利辛县', '341623', '3');
INSERT INTO `jun_area` VALUES ('3504', '39', '贵池区', '341702', '3');
INSERT INTO `jun_area` VALUES ('3505', '39', '东至县', '341721', '3');
INSERT INTO `jun_area` VALUES ('3506', '39', '石台县', '341722', '3');
INSERT INTO `jun_area` VALUES ('3507', '39', '青阳县', '341723', '3');
INSERT INTO `jun_area` VALUES ('3508', '50', '宣州区', '341802', '3');
INSERT INTO `jun_area` VALUES ('3509', '50', '郎溪县', '341821', '3');
INSERT INTO `jun_area` VALUES ('3510', '50', '广德县', '341822', '3');
INSERT INTO `jun_area` VALUES ('3511', '50', '泾县', '341823', '3');
INSERT INTO `jun_area` VALUES ('3512', '50', '绩溪县', '341824', '3');
INSERT INTO `jun_area` VALUES ('3513', '50', '旌德县', '341825', '3');
INSERT INTO `jun_area` VALUES ('3514', '50', '宁国市', '341881', '3');
INSERT INTO `jun_area` VALUES ('3515', '53', '鼓楼区', '350102', '3');
INSERT INTO `jun_area` VALUES ('3516', '53', '台江区', '350103', '3');
INSERT INTO `jun_area` VALUES ('3517', '53', '仓山区', '350104', '3');
INSERT INTO `jun_area` VALUES ('3518', '53', '马尾区', '350105', '3');
INSERT INTO `jun_area` VALUES ('3519', '53', '晋安区', '350111', '3');
INSERT INTO `jun_area` VALUES ('3520', '53', '闽侯县', '350121', '3');
INSERT INTO `jun_area` VALUES ('3521', '53', '连江县', '350122', '3');
INSERT INTO `jun_area` VALUES ('3522', '53', '罗源县', '350123', '3');
INSERT INTO `jun_area` VALUES ('3523', '53', '闽清县', '350124', '3');
INSERT INTO `jun_area` VALUES ('3524', '53', '永泰县', '350125', '3');
INSERT INTO `jun_area` VALUES ('3525', '53', '平潭县', '350128', '3');
INSERT INTO `jun_area` VALUES ('3526', '53', '福清市', '350181', '3');
INSERT INTO `jun_area` VALUES ('3527', '53', '长乐市', '350182', '3');
INSERT INTO `jun_area` VALUES ('3528', '60', '思明区', '350203', '3');
INSERT INTO `jun_area` VALUES ('3529', '60', '海沧区', '350205', '3');
INSERT INTO `jun_area` VALUES ('3530', '60', '湖里区', '350206', '3');
INSERT INTO `jun_area` VALUES ('3531', '60', '集美区', '350211', '3');
INSERT INTO `jun_area` VALUES ('3532', '60', '同安区', '350212', '3');
INSERT INTO `jun_area` VALUES ('3533', '60', '翔安区', '350213', '3');
INSERT INTO `jun_area` VALUES ('3534', '57', '城厢区', '350302', '3');
INSERT INTO `jun_area` VALUES ('3535', '57', '涵江区', '350303', '3');
INSERT INTO `jun_area` VALUES ('3536', '57', '荔城区', '350304', '3');
INSERT INTO `jun_area` VALUES ('3537', '57', '秀屿区', '350305', '3');
INSERT INTO `jun_area` VALUES ('3538', '57', '仙游县', '350322', '3');
INSERT INTO `jun_area` VALUES ('3539', '59', '梅列区', '350402', '3');
INSERT INTO `jun_area` VALUES ('3540', '59', '三元区', '350403', '3');
INSERT INTO `jun_area` VALUES ('3541', '59', '明溪县', '350421', '3');
INSERT INTO `jun_area` VALUES ('3542', '59', '清流县', '350423', '3');
INSERT INTO `jun_area` VALUES ('3543', '59', '宁化县', '350424', '3');
INSERT INTO `jun_area` VALUES ('3544', '59', '大田县', '350425', '3');
INSERT INTO `jun_area` VALUES ('3545', '59', '尤溪县', '350426', '3');
INSERT INTO `jun_area` VALUES ('3546', '59', '沙县', '350427', '3');
INSERT INTO `jun_area` VALUES ('3547', '59', '将乐县', '350428', '3');
INSERT INTO `jun_area` VALUES ('3548', '59', '泰宁县', '350429', '3');
INSERT INTO `jun_area` VALUES ('3549', '59', '建宁县', '350430', '3');
INSERT INTO `jun_area` VALUES ('3550', '59', '永安市', '350481', '3');
INSERT INTO `jun_area` VALUES ('3551', '58', '鲤城区', '350502', '3');
INSERT INTO `jun_area` VALUES ('3552', '58', '丰泽区', '350503', '3');
INSERT INTO `jun_area` VALUES ('3553', '58', '洛江区', '350504', '3');
INSERT INTO `jun_area` VALUES ('3554', '58', '泉港区', '350505', '3');
INSERT INTO `jun_area` VALUES ('3555', '58', '惠安县', '350521', '3');
INSERT INTO `jun_area` VALUES ('3556', '58', '安溪县', '350524', '3');
INSERT INTO `jun_area` VALUES ('3557', '58', '永春县', '350525', '3');
INSERT INTO `jun_area` VALUES ('3558', '58', '德化县', '350526', '3');
INSERT INTO `jun_area` VALUES ('3559', '58', '金门县', '350527', '3');
INSERT INTO `jun_area` VALUES ('3560', '58', '石狮市', '350581', '3');
INSERT INTO `jun_area` VALUES ('3561', '58', '晋江市', '350582', '3');
INSERT INTO `jun_area` VALUES ('3562', '58', '南安市', '350583', '3');
INSERT INTO `jun_area` VALUES ('3563', '61', '芗城区', '350602', '3');
INSERT INTO `jun_area` VALUES ('3564', '61', '龙文区', '350603', '3');
INSERT INTO `jun_area` VALUES ('3565', '61', '云霄县', '350622', '3');
INSERT INTO `jun_area` VALUES ('3566', '61', '漳浦县', '350623', '3');
INSERT INTO `jun_area` VALUES ('3567', '61', '诏安县', '350624', '3');
INSERT INTO `jun_area` VALUES ('3568', '61', '长泰县', '350625', '3');
INSERT INTO `jun_area` VALUES ('3569', '61', '东山县', '350626', '3');
INSERT INTO `jun_area` VALUES ('3570', '61', '南靖县', '350627', '3');
INSERT INTO `jun_area` VALUES ('3571', '61', '平和县', '350628', '3');
INSERT INTO `jun_area` VALUES ('3572', '61', '华安县', '350629', '3');
INSERT INTO `jun_area` VALUES ('3573', '61', '龙海市', '350681', '3');
INSERT INTO `jun_area` VALUES ('3574', '55', '延平区', '350702', '3');
INSERT INTO `jun_area` VALUES ('3575', '55', '顺昌县', '350721', '3');
INSERT INTO `jun_area` VALUES ('3576', '55', '浦城县', '350722', '3');
INSERT INTO `jun_area` VALUES ('3577', '55', '光泽县', '350723', '3');
INSERT INTO `jun_area` VALUES ('3578', '55', '松溪县', '350724', '3');
INSERT INTO `jun_area` VALUES ('3579', '55', '政和县', '350725', '3');
INSERT INTO `jun_area` VALUES ('3580', '55', '邵武市', '350781', '3');
INSERT INTO `jun_area` VALUES ('3581', '55', '武夷山市', '350782', '3');
INSERT INTO `jun_area` VALUES ('3582', '55', '建瓯市', '350783', '3');
INSERT INTO `jun_area` VALUES ('3583', '55', '建阳区', '350703', '3');
INSERT INTO `jun_area` VALUES ('3584', '54', '新罗区', '350802', '3');
INSERT INTO `jun_area` VALUES ('3585', '54', '长汀县', '350821', '3');
INSERT INTO `jun_area` VALUES ('3586', '54', '永定区', '350803', '3');
INSERT INTO `jun_area` VALUES ('3587', '54', '上杭县', '350823', '3');
INSERT INTO `jun_area` VALUES ('3588', '54', '武平县', '350824', '3');
INSERT INTO `jun_area` VALUES ('3589', '54', '连城县', '350825', '3');
INSERT INTO `jun_area` VALUES ('3590', '54', '漳平市', '350881', '3');
INSERT INTO `jun_area` VALUES ('3591', '56', '蕉城区', '350902', '3');
INSERT INTO `jun_area` VALUES ('3592', '56', '霞浦县', '350921', '3');
INSERT INTO `jun_area` VALUES ('3593', '56', '古田县', '350922', '3');
INSERT INTO `jun_area` VALUES ('3594', '56', '屏南县', '350923', '3');
INSERT INTO `jun_area` VALUES ('3595', '56', '寿宁县', '350924', '3');
INSERT INTO `jun_area` VALUES ('3596', '56', '周宁县', '350925', '3');
INSERT INTO `jun_area` VALUES ('3597', '56', '柘荣县', '350926', '3');
INSERT INTO `jun_area` VALUES ('3598', '56', '福安市', '350981', '3');
INSERT INTO `jun_area` VALUES ('3599', '56', '福鼎市', '350982', '3');
INSERT INTO `jun_area` VALUES ('3600', '233', '东湖区', '360102', '3');
INSERT INTO `jun_area` VALUES ('3601', '233', '西湖区', '360103', '3');
INSERT INTO `jun_area` VALUES ('3602', '233', '青云谱区', '360104', '3');
INSERT INTO `jun_area` VALUES ('3603', '233', '湾里区', '360105', '3');
INSERT INTO `jun_area` VALUES ('3604', '233', '青山湖区', '360111', '3');
INSERT INTO `jun_area` VALUES ('3605', '233', '南昌县', '360121', '3');
INSERT INTO `jun_area` VALUES ('3606', '233', '新建区', '360112', '3');
INSERT INTO `jun_area` VALUES ('3607', '233', '安义县', '360123', '3');
INSERT INTO `jun_area` VALUES ('3608', '233', '进贤县', '360124', '3');
INSERT INTO `jun_area` VALUES ('3609', '237', '昌江区', '360202', '3');
INSERT INTO `jun_area` VALUES ('3610', '237', '珠山区', '360203', '3');
INSERT INTO `jun_area` VALUES ('3611', '237', '浮梁县', '360222', '3');
INSERT INTO `jun_area` VALUES ('3612', '237', '乐平市', '360281', '3');
INSERT INTO `jun_area` VALUES ('3613', '239', '安源区', '360302', '3');
INSERT INTO `jun_area` VALUES ('3614', '239', '湘东区', '360313', '3');
INSERT INTO `jun_area` VALUES ('3615', '239', '莲花县', '360321', '3');
INSERT INTO `jun_area` VALUES ('3616', '239', '上栗县', '360322', '3');
INSERT INTO `jun_area` VALUES ('3617', '239', '芦溪县', '360323', '3');
INSERT INTO `jun_area` VALUES ('3618', '238', '庐山区', '360402', '3');
INSERT INTO `jun_area` VALUES ('3619', '238', '浔阳区', '360403', '3');
INSERT INTO `jun_area` VALUES ('3620', '238', '九江县', '360421', '3');
INSERT INTO `jun_area` VALUES ('3621', '238', '武宁县', '360423', '3');
INSERT INTO `jun_area` VALUES ('3622', '238', '修水县', '360424', '3');
INSERT INTO `jun_area` VALUES ('3623', '238', '永修县', '360425', '3');
INSERT INTO `jun_area` VALUES ('3624', '238', '德安县', '360426', '3');
INSERT INTO `jun_area` VALUES ('3625', '238', '星子县', '360427', '3');
INSERT INTO `jun_area` VALUES ('3626', '238', '都昌县', '360428', '3');
INSERT INTO `jun_area` VALUES ('3627', '238', '湖口县', '360429', '3');
INSERT INTO `jun_area` VALUES ('3628', '238', '彭泽县', '360430', '3');
INSERT INTO `jun_area` VALUES ('3629', '238', '瑞昌市', '360481', '3');
INSERT INTO `jun_area` VALUES ('3630', '241', '渝水区', '360502', '3');
INSERT INTO `jun_area` VALUES ('3631', '241', '分宜县', '360521', '3');
INSERT INTO `jun_area` VALUES ('3632', '243', '月湖区', '360602', '3');
INSERT INTO `jun_area` VALUES ('3633', '243', '余江县', '360622', '3');
INSERT INTO `jun_area` VALUES ('3634', '243', '贵溪市', '360681', '3');
INSERT INTO `jun_area` VALUES ('3635', '235', '章贡区', '360702', '3');
INSERT INTO `jun_area` VALUES ('3636', '235', '赣县', '360721', '3');
INSERT INTO `jun_area` VALUES ('3637', '235', '信丰县', '360722', '3');
INSERT INTO `jun_area` VALUES ('3638', '235', '大余县', '360723', '3');
INSERT INTO `jun_area` VALUES ('3639', '235', '上犹县', '360724', '3');
INSERT INTO `jun_area` VALUES ('3640', '235', '崇义县', '360725', '3');
INSERT INTO `jun_area` VALUES ('3641', '235', '安远县', '360726', '3');
INSERT INTO `jun_area` VALUES ('3642', '235', '龙南县', '360727', '3');
INSERT INTO `jun_area` VALUES ('3643', '235', '定南县', '360728', '3');
INSERT INTO `jun_area` VALUES ('3644', '235', '全南县', '360729', '3');
INSERT INTO `jun_area` VALUES ('3645', '235', '宁都县', '360730', '3');
INSERT INTO `jun_area` VALUES ('3646', '235', '于都县', '360731', '3');
INSERT INTO `jun_area` VALUES ('3647', '235', '兴国县', '360732', '3');
INSERT INTO `jun_area` VALUES ('3648', '235', '会昌县', '360733', '3');
INSERT INTO `jun_area` VALUES ('3649', '235', '寻乌县', '360734', '3');
INSERT INTO `jun_area` VALUES ('3650', '235', '石城县', '360735', '3');
INSERT INTO `jun_area` VALUES ('3651', '235', '瑞金市', '360781', '3');
INSERT INTO `jun_area` VALUES ('3652', '235', '南康区', '360703', '3');
INSERT INTO `jun_area` VALUES ('3653', '236', '吉州区', '360802', '3');
INSERT INTO `jun_area` VALUES ('3654', '236', '青原区', '360803', '3');
INSERT INTO `jun_area` VALUES ('3655', '236', '吉安县', '360821', '3');
INSERT INTO `jun_area` VALUES ('3656', '236', '吉水县', '360822', '3');
INSERT INTO `jun_area` VALUES ('3657', '236', '峡江县', '360823', '3');
INSERT INTO `jun_area` VALUES ('3658', '236', '新干县', '360824', '3');
INSERT INTO `jun_area` VALUES ('3659', '236', '永丰县', '360825', '3');
INSERT INTO `jun_area` VALUES ('3660', '236', '泰和县', '360826', '3');
INSERT INTO `jun_area` VALUES ('3661', '236', '遂川县', '360827', '3');
INSERT INTO `jun_area` VALUES ('3662', '236', '万安县', '360828', '3');
INSERT INTO `jun_area` VALUES ('3663', '236', '安福县', '360829', '3');
INSERT INTO `jun_area` VALUES ('3664', '236', '永新县', '360830', '3');
INSERT INTO `jun_area` VALUES ('3665', '236', '井冈山市', '360881', '3');
INSERT INTO `jun_area` VALUES ('3666', '242', '袁州区', '360902', '3');
INSERT INTO `jun_area` VALUES ('3667', '242', '奉新县', '360921', '3');
INSERT INTO `jun_area` VALUES ('3668', '242', '万载县', '360922', '3');
INSERT INTO `jun_area` VALUES ('3669', '242', '上高县', '360923', '3');
INSERT INTO `jun_area` VALUES ('3670', '242', '宜丰县', '360924', '3');
INSERT INTO `jun_area` VALUES ('3671', '242', '靖安县', '360925', '3');
INSERT INTO `jun_area` VALUES ('3672', '242', '铜鼓县', '360926', '3');
INSERT INTO `jun_area` VALUES ('3673', '242', '丰城市', '360981', '3');
INSERT INTO `jun_area` VALUES ('3674', '242', '樟树市', '360982', '3');
INSERT INTO `jun_area` VALUES ('3675', '242', '高安市', '360983', '3');
INSERT INTO `jun_area` VALUES ('3676', '234', '临川区', '361002', '3');
INSERT INTO `jun_area` VALUES ('3677', '234', '南城县', '361021', '3');
INSERT INTO `jun_area` VALUES ('3678', '234', '黎川县', '361022', '3');
INSERT INTO `jun_area` VALUES ('3679', '234', '南丰县', '361023', '3');
INSERT INTO `jun_area` VALUES ('3680', '234', '崇仁县', '361024', '3');
INSERT INTO `jun_area` VALUES ('3681', '234', '乐安县', '361025', '3');
INSERT INTO `jun_area` VALUES ('3682', '234', '宜黄县', '361026', '3');
INSERT INTO `jun_area` VALUES ('3683', '234', '金溪县', '361027', '3');
INSERT INTO `jun_area` VALUES ('3684', '234', '资溪县', '361028', '3');
INSERT INTO `jun_area` VALUES ('3685', '234', '东乡县', '361029', '3');
INSERT INTO `jun_area` VALUES ('3686', '234', '广昌县', '361030', '3');
INSERT INTO `jun_area` VALUES ('3687', '240', '信州区', '361102', '3');
INSERT INTO `jun_area` VALUES ('3688', '240', '上饶县', '361121', '3');
INSERT INTO `jun_area` VALUES ('3689', '240', '广丰区', '361103', '3');
INSERT INTO `jun_area` VALUES ('3690', '240', '玉山县', '361123', '3');
INSERT INTO `jun_area` VALUES ('3691', '240', '铅山县', '361124', '3');
INSERT INTO `jun_area` VALUES ('3692', '240', '横峰县', '361125', '3');
INSERT INTO `jun_area` VALUES ('3693', '240', '弋阳县', '361126', '3');
INSERT INTO `jun_area` VALUES ('3694', '240', '余干县', '361127', '3');
INSERT INTO `jun_area` VALUES ('3695', '240', '鄱阳县', '361128', '3');
INSERT INTO `jun_area` VALUES ('3696', '240', '万年县', '361129', '3');
INSERT INTO `jun_area` VALUES ('3697', '240', '婺源县', '361130', '3');
INSERT INTO `jun_area` VALUES ('3698', '240', '德兴市', '361181', '3');
INSERT INTO `jun_area` VALUES ('3699', '283', '历下区', '370102', '3');
INSERT INTO `jun_area` VALUES ('3700', '283', '市中区', '370103', '3');
INSERT INTO `jun_area` VALUES ('3701', '283', '槐荫区', '370104', '3');
INSERT INTO `jun_area` VALUES ('3702', '283', '天桥区', '370105', '3');
INSERT INTO `jun_area` VALUES ('3703', '283', '历城区', '370112', '3');
INSERT INTO `jun_area` VALUES ('3704', '283', '长清区', '370113', '3');
INSERT INTO `jun_area` VALUES ('3705', '283', '平阴县', '370124', '3');
INSERT INTO `jun_area` VALUES ('3706', '283', '济阳县', '370125', '3');
INSERT INTO `jun_area` VALUES ('3707', '283', '商河县', '370126', '3');
INSERT INTO `jun_area` VALUES ('3708', '283', '章丘市', '370181', '3');
INSERT INTO `jun_area` VALUES ('3709', '284', '市南区', '370202', '3');
INSERT INTO `jun_area` VALUES ('3710', '284', '市北区', '370203', '3');
INSERT INTO `jun_area` VALUES ('5350', '369', '墨江哈尼族自治县', '530822', '3');
INSERT INTO `jun_area` VALUES ('3712', '284', '黄岛区', '370211', '3');
INSERT INTO `jun_area` VALUES ('3713', '284', '崂山区', '370212', '3');
INSERT INTO `jun_area` VALUES ('3714', '284', '李沧区', '370213', '3');
INSERT INTO `jun_area` VALUES ('3715', '284', '城阳区', '370214', '3');
INSERT INTO `jun_area` VALUES ('3716', '284', '胶州市', '370281', '3');
INSERT INTO `jun_area` VALUES ('3717', '284', '即墨市', '370282', '3');
INSERT INTO `jun_area` VALUES ('3718', '284', '平度市', '370283', '3');
INSERT INTO `jun_area` VALUES ('3720', '284', '莱西市', '370285', '3');
INSERT INTO `jun_area` VALUES ('3721', '299', '淄川区', '370302', '3');
INSERT INTO `jun_area` VALUES ('3722', '299', '张店区', '370303', '3');
INSERT INTO `jun_area` VALUES ('3723', '299', '博山区', '370304', '3');
INSERT INTO `jun_area` VALUES ('3724', '299', '临淄区', '370305', '3');
INSERT INTO `jun_area` VALUES ('3725', '299', '周村区', '370306', '3');
INSERT INTO `jun_area` VALUES ('3726', '299', '桓台县', '370321', '3');
INSERT INTO `jun_area` VALUES ('3727', '299', '高青县', '370322', '3');
INSERT INTO `jun_area` VALUES ('3728', '299', '沂源县', '370323', '3');
INSERT INTO `jun_area` VALUES ('3729', '298', '市中区', '370402', '3');
INSERT INTO `jun_area` VALUES ('3730', '298', '薛城区', '370403', '3');
INSERT INTO `jun_area` VALUES ('3731', '298', '峄城区', '370404', '3');
INSERT INTO `jun_area` VALUES ('3732', '298', '台儿庄区', '370405', '3');
INSERT INTO `jun_area` VALUES ('3733', '298', '山亭区', '370406', '3');
INSERT INTO `jun_area` VALUES ('3734', '298', '滕州市', '370481', '3');
INSERT INTO `jun_area` VALUES ('3735', '287', '东营区', '370502', '3');
INSERT INTO `jun_area` VALUES ('3736', '287', '河口区', '370503', '3');
INSERT INTO `jun_area` VALUES ('3737', '287', '垦利县', '370521', '3');
INSERT INTO `jun_area` VALUES ('3738', '287', '利津县', '370522', '3');
INSERT INTO `jun_area` VALUES ('3739', '287', '广饶县', '370523', '3');
INSERT INTO `jun_area` VALUES ('3740', '297', '芝罘区', '370602', '3');
INSERT INTO `jun_area` VALUES ('3741', '297', '福山区', '370611', '3');
INSERT INTO `jun_area` VALUES ('3742', '297', '牟平区', '370612', '3');
INSERT INTO `jun_area` VALUES ('3743', '297', '莱山区', '370613', '3');
INSERT INTO `jun_area` VALUES ('3744', '297', '长岛县', '370634', '3');
INSERT INTO `jun_area` VALUES ('3745', '297', '龙口市', '370681', '3');
INSERT INTO `jun_area` VALUES ('3746', '297', '莱阳市', '370682', '3');
INSERT INTO `jun_area` VALUES ('3747', '297', '莱州市', '370683', '3');
INSERT INTO `jun_area` VALUES ('3748', '297', '蓬莱市', '370684', '3');
INSERT INTO `jun_area` VALUES ('3749', '297', '招远市', '370685', '3');
INSERT INTO `jun_area` VALUES ('3750', '297', '栖霞市', '370686', '3');
INSERT INTO `jun_area` VALUES ('3751', '297', '海阳市', '370687', '3');
INSERT INTO `jun_area` VALUES ('3752', '296', '潍城区', '370702', '3');
INSERT INTO `jun_area` VALUES ('3753', '296', '寒亭区', '370703', '3');
INSERT INTO `jun_area` VALUES ('3754', '296', '坊子区', '370704', '3');
INSERT INTO `jun_area` VALUES ('3755', '296', '奎文区', '370705', '3');
INSERT INTO `jun_area` VALUES ('3756', '296', '临朐县', '370724', '3');
INSERT INTO `jun_area` VALUES ('3757', '296', '昌乐县', '370725', '3');
INSERT INTO `jun_area` VALUES ('3758', '296', '青州市', '370781', '3');
INSERT INTO `jun_area` VALUES ('3759', '296', '诸城市', '370782', '3');
INSERT INTO `jun_area` VALUES ('3760', '296', '寿光市', '370783', '3');
INSERT INTO `jun_area` VALUES ('3761', '296', '安丘市', '370784', '3');
INSERT INTO `jun_area` VALUES ('3762', '296', '高密市', '370785', '3');
INSERT INTO `jun_area` VALUES ('3763', '296', '昌邑市', '370786', '3');
INSERT INTO `jun_area` VALUES ('5349', '369', '宁洱哈尼族彝族自治县', '530821', '3');
INSERT INTO `jun_area` VALUES ('3765', '289', '任城区', '370811', '3');
INSERT INTO `jun_area` VALUES ('3766', '289', '微山县', '370826', '3');
INSERT INTO `jun_area` VALUES ('3767', '289', '鱼台县', '370827', '3');
INSERT INTO `jun_area` VALUES ('3768', '289', '金乡县', '370828', '3');
INSERT INTO `jun_area` VALUES ('3769', '289', '嘉祥县', '370829', '3');
INSERT INTO `jun_area` VALUES ('3770', '289', '汶上县', '370830', '3');
INSERT INTO `jun_area` VALUES ('3771', '289', '泗水县', '370831', '3');
INSERT INTO `jun_area` VALUES ('3772', '289', '梁山县', '370832', '3');
INSERT INTO `jun_area` VALUES ('3773', '289', '曲阜市', '370881', '3');
INSERT INTO `jun_area` VALUES ('3774', '289', '兖州区', '370812', '3');
INSERT INTO `jun_area` VALUES ('3775', '289', '邹城市', '370883', '3');
INSERT INTO `jun_area` VALUES ('3776', '294', '泰山区', '370902', '3');
INSERT INTO `jun_area` VALUES ('3777', '294', '岱岳区', '370911', '3');
INSERT INTO `jun_area` VALUES ('3778', '294', '宁阳县', '370921', '3');
INSERT INTO `jun_area` VALUES ('3779', '294', '东平县', '370923', '3');
INSERT INTO `jun_area` VALUES ('3780', '294', '新泰市', '370982', '3');
INSERT INTO `jun_area` VALUES ('3781', '294', '肥城市', '370983', '3');
INSERT INTO `jun_area` VALUES ('3782', '295', '环翠区', '371002', '3');
INSERT INTO `jun_area` VALUES ('3783', '295', '文登区', '371003', '3');
INSERT INTO `jun_area` VALUES ('3784', '295', '荣成市', '371082', '3');
INSERT INTO `jun_area` VALUES ('3785', '295', '乳山市', '371083', '3');
INSERT INTO `jun_area` VALUES ('3786', '293', '东港区', '371102', '3');
INSERT INTO `jun_area` VALUES ('3787', '293', '岚山区', '371103', '3');
INSERT INTO `jun_area` VALUES ('3788', '293', '五莲县', '371121', '3');
INSERT INTO `jun_area` VALUES ('3789', '293', '莒县', '371122', '3');
INSERT INTO `jun_area` VALUES ('3790', '290', '莱城区', '371202', '3');
INSERT INTO `jun_area` VALUES ('3791', '290', '钢城区', '371203', '3');
INSERT INTO `jun_area` VALUES ('3792', '292', '兰山区', '371302', '3');
INSERT INTO `jun_area` VALUES ('3793', '292', '罗庄区', '371311', '3');
INSERT INTO `jun_area` VALUES ('3794', '292', '河东区', '371312', '3');
INSERT INTO `jun_area` VALUES ('3795', '292', '沂南县', '371321', '3');
INSERT INTO `jun_area` VALUES ('3796', '292', '郯城县', '371322', '3');
INSERT INTO `jun_area` VALUES ('3797', '292', '沂水县', '371323', '3');
INSERT INTO `jun_area` VALUES ('3798', '292', '兰陵县', '371324', '3');
INSERT INTO `jun_area` VALUES ('3799', '292', '费县', '371325', '3');
INSERT INTO `jun_area` VALUES ('3800', '292', '平邑县', '371326', '3');
INSERT INTO `jun_area` VALUES ('3801', '292', '莒南县', '371327', '3');
INSERT INTO `jun_area` VALUES ('3802', '292', '蒙阴县', '371328', '3');
INSERT INTO `jun_area` VALUES ('3803', '292', '临沭县', '371329', '3');
INSERT INTO `jun_area` VALUES ('3804', '286', '德城区', '371402', '3');
INSERT INTO `jun_area` VALUES ('3805', '286', '陵城区', '371403', '3');
INSERT INTO `jun_area` VALUES ('3806', '286', '宁津县', '371422', '3');
INSERT INTO `jun_area` VALUES ('3807', '286', '庆云县', '371423', '3');
INSERT INTO `jun_area` VALUES ('3808', '286', '临邑县', '371424', '3');
INSERT INTO `jun_area` VALUES ('3809', '286', '齐河县', '371425', '3');
INSERT INTO `jun_area` VALUES ('3810', '286', '平原县', '371426', '3');
INSERT INTO `jun_area` VALUES ('3811', '286', '夏津县', '371427', '3');
INSERT INTO `jun_area` VALUES ('3812', '286', '武城县', '371428', '3');
INSERT INTO `jun_area` VALUES ('3813', '286', '乐陵市', '371481', '3');
INSERT INTO `jun_area` VALUES ('3814', '286', '禹城市', '371482', '3');
INSERT INTO `jun_area` VALUES ('3815', '291', '东昌府区', '371502', '3');
INSERT INTO `jun_area` VALUES ('3816', '291', '阳谷县', '371521', '3');
INSERT INTO `jun_area` VALUES ('3817', '291', '莘县', '371522', '3');
INSERT INTO `jun_area` VALUES ('3818', '291', '茌平县', '371523', '3');
INSERT INTO `jun_area` VALUES ('3819', '291', '东阿县', '371524', '3');
INSERT INTO `jun_area` VALUES ('3820', '291', '冠县', '371525', '3');
INSERT INTO `jun_area` VALUES ('3821', '291', '高唐县', '371526', '3');
INSERT INTO `jun_area` VALUES ('3822', '291', '临清市', '371581', '3');
INSERT INTO `jun_area` VALUES ('3823', '285', '滨城区', '371602', '3');
INSERT INTO `jun_area` VALUES ('3824', '285', '惠民县', '371621', '3');
INSERT INTO `jun_area` VALUES ('3825', '285', '阳信县', '371622', '3');
INSERT INTO `jun_area` VALUES ('3826', '285', '无棣县', '371623', '3');
INSERT INTO `jun_area` VALUES ('3827', '285', '沾化区', '371603', '3');
INSERT INTO `jun_area` VALUES ('3828', '285', '博兴县', '371625', '3');
INSERT INTO `jun_area` VALUES ('3829', '285', '邹平县', '371626', '3');
INSERT INTO `jun_area` VALUES ('3830', '288', '牡丹区', '371702', '3');
INSERT INTO `jun_area` VALUES ('3831', '288', '曹县', '371721', '3');
INSERT INTO `jun_area` VALUES ('3832', '288', '单县', '371722', '3');
INSERT INTO `jun_area` VALUES ('3833', '288', '成武县', '371723', '3');
INSERT INTO `jun_area` VALUES ('3834', '288', '巨野县', '371724', '3');
INSERT INTO `jun_area` VALUES ('3835', '288', '郓城县', '371725', '3');
INSERT INTO `jun_area` VALUES ('3836', '288', '鄄城县', '371726', '3');
INSERT INTO `jun_area` VALUES ('3837', '288', '定陶县', '371727', '3');
INSERT INTO `jun_area` VALUES ('3838', '288', '东明县', '371728', '3');
INSERT INTO `jun_area` VALUES ('3839', '149', '中原区', '410102', '3');
INSERT INTO `jun_area` VALUES ('3840', '149', '二七区', '410103', '3');
INSERT INTO `jun_area` VALUES ('3841', '149', '管城回族区', '410104', '3');
INSERT INTO `jun_area` VALUES ('3842', '149', '金水区', '410105', '3');
INSERT INTO `jun_area` VALUES ('3843', '149', '上街区', '410106', '3');
INSERT INTO `jun_area` VALUES ('3844', '149', '惠济区', '410108', '3');
INSERT INTO `jun_area` VALUES ('3845', '149', '中牟县', '410122', '3');
INSERT INTO `jun_area` VALUES ('3846', '149', '巩义市', '410181', '3');
INSERT INTO `jun_area` VALUES ('3847', '149', '荥阳市', '410182', '3');
INSERT INTO `jun_area` VALUES ('3848', '149', '新密市', '410183', '3');
INSERT INTO `jun_area` VALUES ('3849', '149', '新郑市', '410184', '3');
INSERT INTO `jun_area` VALUES ('3850', '149', '登封市', '410185', '3');
INSERT INTO `jun_area` VALUES ('3851', '151', '龙亭区', '410202', '3');
INSERT INTO `jun_area` VALUES ('3852', '151', '顺河回族区', '410203', '3');
INSERT INTO `jun_area` VALUES ('3853', '151', '鼓楼区', '410204', '3');
INSERT INTO `jun_area` VALUES ('3854', '151', '禹王台区', '410205', '3');
INSERT INTO `jun_area` VALUES ('3855', '151', '金明区', '410211', '3');
INSERT INTO `jun_area` VALUES ('3856', '151', '杞县', '410221', '3');
INSERT INTO `jun_area` VALUES ('3857', '151', '通许县', '410222', '3');
INSERT INTO `jun_area` VALUES ('3858', '151', '尉氏县', '410223', '3');
INSERT INTO `jun_area` VALUES ('3860', '151', '兰考县', '410225', '3');
INSERT INTO `jun_area` VALUES ('3861', '150', '老城区', '410302', '3');
INSERT INTO `jun_area` VALUES ('3862', '150', '西工区', '410303', '3');
INSERT INTO `jun_area` VALUES ('3863', '150', '廛河回族区', '410304', '3');
INSERT INTO `jun_area` VALUES ('3864', '150', '涧西区', '410305', '3');
INSERT INTO `jun_area` VALUES ('3865', '150', '吉利区', '410306', '3');
INSERT INTO `jun_area` VALUES ('3866', '150', '洛龙区', '410311', '3');
INSERT INTO `jun_area` VALUES ('3867', '150', '孟津县', '410322', '3');
INSERT INTO `jun_area` VALUES ('3868', '150', '新安县', '410323', '3');
INSERT INTO `jun_area` VALUES ('3869', '150', '栾川县', '410324', '3');
INSERT INTO `jun_area` VALUES ('3870', '150', '嵩县', '410325', '3');
INSERT INTO `jun_area` VALUES ('3871', '150', '汝阳县', '410326', '3');
INSERT INTO `jun_area` VALUES ('3872', '150', '宜阳县', '410327', '3');
INSERT INTO `jun_area` VALUES ('3873', '150', '洛宁县', '410328', '3');
INSERT INTO `jun_area` VALUES ('3874', '150', '伊川县', '410329', '3');
INSERT INTO `jun_area` VALUES ('3875', '150', '偃师市', '410381', '3');
INSERT INTO `jun_area` VALUES ('3876', '157', '新华区', '410402', '3');
INSERT INTO `jun_area` VALUES ('3877', '157', '卫东区', '410403', '3');
INSERT INTO `jun_area` VALUES ('3878', '157', '石龙区', '410404', '3');
INSERT INTO `jun_area` VALUES ('3879', '157', '湛河区', '410411', '3');
INSERT INTO `jun_area` VALUES ('3880', '157', '宝丰县', '410421', '3');
INSERT INTO `jun_area` VALUES ('3881', '157', '叶县', '410422', '3');
INSERT INTO `jun_area` VALUES ('3882', '157', '鲁山县', '410423', '3');
INSERT INTO `jun_area` VALUES ('3883', '157', '郏县', '410425', '3');
INSERT INTO `jun_area` VALUES ('3884', '157', '舞钢市', '410481', '3');
INSERT INTO `jun_area` VALUES ('3885', '157', '汝州市', '410482', '3');
INSERT INTO `jun_area` VALUES ('3886', '152', '文峰区', '410502', '3');
INSERT INTO `jun_area` VALUES ('3887', '152', '北关区', '410503', '3');
INSERT INTO `jun_area` VALUES ('3888', '152', '殷都区', '410505', '3');
INSERT INTO `jun_area` VALUES ('3889', '152', '龙安区', '410506', '3');
INSERT INTO `jun_area` VALUES ('3890', '152', '安阳县', '410522', '3');
INSERT INTO `jun_area` VALUES ('3891', '152', '汤阴县', '410523', '3');
INSERT INTO `jun_area` VALUES ('3892', '152', '滑县', '410526', '3');
INSERT INTO `jun_area` VALUES ('3893', '152', '内黄县', '410527', '3');
INSERT INTO `jun_area` VALUES ('3894', '152', '林州市', '410581', '3');
INSERT INTO `jun_area` VALUES ('3895', '153', '鹤山区', '410602', '3');
INSERT INTO `jun_area` VALUES ('3896', '153', '山城区', '410603', '3');
INSERT INTO `jun_area` VALUES ('3897', '153', '淇滨区', '410611', '3');
INSERT INTO `jun_area` VALUES ('3898', '153', '浚县', '410621', '3');
INSERT INTO `jun_area` VALUES ('3899', '153', '淇县', '410622', '3');
INSERT INTO `jun_area` VALUES ('3900', '160', '红旗区', '410702', '3');
INSERT INTO `jun_area` VALUES ('3901', '160', '卫滨区', '410703', '3');
INSERT INTO `jun_area` VALUES ('3902', '160', '凤泉区', '410704', '3');
INSERT INTO `jun_area` VALUES ('3903', '160', '牧野区', '410711', '3');
INSERT INTO `jun_area` VALUES ('3904', '160', '新乡县', '410721', '3');
INSERT INTO `jun_area` VALUES ('3905', '160', '获嘉县', '410724', '3');
INSERT INTO `jun_area` VALUES ('3906', '160', '原阳县', '410725', '3');
INSERT INTO `jun_area` VALUES ('3907', '160', '延津县', '410726', '3');
INSERT INTO `jun_area` VALUES ('3908', '160', '封丘县', '410727', '3');
INSERT INTO `jun_area` VALUES ('3909', '160', '长垣县', '410728', '3');
INSERT INTO `jun_area` VALUES ('3910', '160', '卫辉市', '410781', '3');
INSERT INTO `jun_area` VALUES ('3911', '160', '辉县市', '410782', '3');
INSERT INTO `jun_area` VALUES ('3912', '155', '解放区', '410802', '3');
INSERT INTO `jun_area` VALUES ('3913', '155', '中站区', '410803', '3');
INSERT INTO `jun_area` VALUES ('3914', '155', '马村区', '410804', '3');
INSERT INTO `jun_area` VALUES ('3915', '155', '山阳区', '410811', '3');
INSERT INTO `jun_area` VALUES ('3916', '155', '修武县', '410821', '3');
INSERT INTO `jun_area` VALUES ('3917', '155', '博爱县', '410822', '3');
INSERT INTO `jun_area` VALUES ('3918', '155', '武陟县', '410823', '3');
INSERT INTO `jun_area` VALUES ('3919', '155', '温县', '410825', '3');
INSERT INTO `jun_area` VALUES ('3920', '155', '济源市', '410881', '3');
INSERT INTO `jun_area` VALUES ('3921', '155', '沁阳市', '410882', '3');
INSERT INTO `jun_area` VALUES ('3922', '155', '孟州市', '410883', '3');
INSERT INTO `jun_area` VALUES ('3923', '166', '华龙区', '410902', '3');
INSERT INTO `jun_area` VALUES ('3924', '166', '清丰县', '410922', '3');
INSERT INTO `jun_area` VALUES ('3925', '166', '南乐县', '410923', '3');
INSERT INTO `jun_area` VALUES ('3926', '166', '范县', '410926', '3');
INSERT INTO `jun_area` VALUES ('3927', '166', '台前县', '410927', '3');
INSERT INTO `jun_area` VALUES ('3928', '166', '濮阳县', '410928', '3');
INSERT INTO `jun_area` VALUES ('3929', '162', '魏都区', '411002', '3');
INSERT INTO `jun_area` VALUES ('3930', '162', '许昌县', '411023', '3');
INSERT INTO `jun_area` VALUES ('3931', '162', '鄢陵县', '411024', '3');
INSERT INTO `jun_area` VALUES ('3932', '162', '襄城县', '411025', '3');
INSERT INTO `jun_area` VALUES ('3933', '162', '禹州市', '411081', '3');
INSERT INTO `jun_area` VALUES ('3934', '162', '长葛市', '411082', '3');
INSERT INTO `jun_area` VALUES ('3935', '165', '源汇区', '411102', '3');
INSERT INTO `jun_area` VALUES ('3936', '165', '郾城区', '411103', '3');
INSERT INTO `jun_area` VALUES ('3937', '165', '召陵区', '411104', '3');
INSERT INTO `jun_area` VALUES ('3938', '165', '舞阳县', '411121', '3');
INSERT INTO `jun_area` VALUES ('3939', '165', '临颍县', '411122', '3');
INSERT INTO `jun_area` VALUES ('3940', '158', '湖滨区', '411202', '3');
INSERT INTO `jun_area` VALUES ('3941', '158', '渑池县', '411221', '3');
INSERT INTO `jun_area` VALUES ('3942', '158', '陕县', '411222', '3');
INSERT INTO `jun_area` VALUES ('3943', '158', '卢氏县', '411224', '3');
INSERT INTO `jun_area` VALUES ('3944', '158', '义马市', '411281', '3');
INSERT INTO `jun_area` VALUES ('3945', '158', '灵宝市', '411282', '3');
INSERT INTO `jun_area` VALUES ('3946', '156', '宛城区', '411302', '3');
INSERT INTO `jun_area` VALUES ('3947', '156', '卧龙区', '411303', '3');
INSERT INTO `jun_area` VALUES ('3948', '156', '南召县', '411321', '3');
INSERT INTO `jun_area` VALUES ('3949', '156', '方城县', '411322', '3');
INSERT INTO `jun_area` VALUES ('3950', '156', '西峡县', '411323', '3');
INSERT INTO `jun_area` VALUES ('3951', '156', '镇平县', '411324', '3');
INSERT INTO `jun_area` VALUES ('3952', '156', '内乡县', '411325', '3');
INSERT INTO `jun_area` VALUES ('3953', '156', '淅川县', '411326', '3');
INSERT INTO `jun_area` VALUES ('3954', '156', '社旗县', '411327', '3');
INSERT INTO `jun_area` VALUES ('3955', '156', '唐河县', '411328', '3');
INSERT INTO `jun_area` VALUES ('3956', '156', '新野县', '411329', '3');
INSERT INTO `jun_area` VALUES ('3957', '156', '桐柏县', '411330', '3');
INSERT INTO `jun_area` VALUES ('3958', '156', '邓州市', '411381', '3');
INSERT INTO `jun_area` VALUES ('3959', '159', '梁园区', '411402', '3');
INSERT INTO `jun_area` VALUES ('3960', '159', '睢阳区', '411403', '3');
INSERT INTO `jun_area` VALUES ('3961', '159', '民权县', '411421', '3');
INSERT INTO `jun_area` VALUES ('3962', '159', '睢县', '411422', '3');
INSERT INTO `jun_area` VALUES ('3963', '159', '宁陵县', '411423', '3');
INSERT INTO `jun_area` VALUES ('3964', '159', '柘城县', '411424', '3');
INSERT INTO `jun_area` VALUES ('3965', '159', '虞城县', '411425', '3');
INSERT INTO `jun_area` VALUES ('3966', '159', '夏邑县', '411426', '3');
INSERT INTO `jun_area` VALUES ('3967', '159', '永城市', '411481', '3');
INSERT INTO `jun_area` VALUES ('3968', '161', '浉河区', '411502', '3');
INSERT INTO `jun_area` VALUES ('3969', '161', '平桥区', '411503', '3');
INSERT INTO `jun_area` VALUES ('3970', '161', '罗山县', '411521', '3');
INSERT INTO `jun_area` VALUES ('3971', '161', '光山县', '411522', '3');
INSERT INTO `jun_area` VALUES ('3972', '161', '新县', '411523', '3');
INSERT INTO `jun_area` VALUES ('3973', '161', '商城县', '411524', '3');
INSERT INTO `jun_area` VALUES ('3974', '161', '固始县', '411525', '3');
INSERT INTO `jun_area` VALUES ('3975', '161', '潢川县', '411526', '3');
INSERT INTO `jun_area` VALUES ('3976', '161', '淮滨县', '411527', '3');
INSERT INTO `jun_area` VALUES ('3977', '161', '息县', '411528', '3');
INSERT INTO `jun_area` VALUES ('3978', '163', '川汇区', '411602', '3');
INSERT INTO `jun_area` VALUES ('3979', '163', '扶沟县', '411621', '3');
INSERT INTO `jun_area` VALUES ('3980', '163', '西华县', '411622', '3');
INSERT INTO `jun_area` VALUES ('3981', '163', '商水县', '411623', '3');
INSERT INTO `jun_area` VALUES ('3982', '163', '沈丘县', '411624', '3');
INSERT INTO `jun_area` VALUES ('3983', '163', '郸城县', '411625', '3');
INSERT INTO `jun_area` VALUES ('3984', '163', '淮阳县', '411626', '3');
INSERT INTO `jun_area` VALUES ('3985', '163', '太康县', '411627', '3');
INSERT INTO `jun_area` VALUES ('3986', '163', '鹿邑县', '411628', '3');
INSERT INTO `jun_area` VALUES ('3987', '163', '项城市', '411681', '3');
INSERT INTO `jun_area` VALUES ('3988', '164', '驿城区', '411702', '3');
INSERT INTO `jun_area` VALUES ('3989', '164', '西平县', '411721', '3');
INSERT INTO `jun_area` VALUES ('3990', '164', '上蔡县', '411722', '3');
INSERT INTO `jun_area` VALUES ('3991', '164', '平舆县', '411723', '3');
INSERT INTO `jun_area` VALUES ('3992', '164', '正阳县', '411724', '3');
INSERT INTO `jun_area` VALUES ('3993', '164', '确山县', '411725', '3');
INSERT INTO `jun_area` VALUES ('3994', '164', '泌阳县', '411726', '3');
INSERT INTO `jun_area` VALUES ('3995', '164', '汝南县', '411727', '3');
INSERT INTO `jun_area` VALUES ('3996', '164', '遂平县', '411728', '3');
INSERT INTO `jun_area` VALUES ('3997', '164', '新蔡县', '411729', '3');
INSERT INTO `jun_area` VALUES ('3998', '180', '江岸区', '420102', '3');
INSERT INTO `jun_area` VALUES ('3999', '180', '江汉区', '420103', '3');
INSERT INTO `jun_area` VALUES ('4000', '180', '硚口区', '420104', '3');
INSERT INTO `jun_area` VALUES ('4001', '180', '汉阳区', '420105', '3');
INSERT INTO `jun_area` VALUES ('4002', '180', '武昌区', '420106', '3');
INSERT INTO `jun_area` VALUES ('4003', '180', '青山区', '420107', '3');
INSERT INTO `jun_area` VALUES ('4004', '180', '洪山区', '420111', '3');
INSERT INTO `jun_area` VALUES ('4005', '180', '东西湖区', '420112', '3');
INSERT INTO `jun_area` VALUES ('4006', '180', '汉南区', '420113', '3');
INSERT INTO `jun_area` VALUES ('4007', '180', '蔡甸区', '420114', '3');
INSERT INTO `jun_area` VALUES ('4008', '180', '江夏区', '420115', '3');
INSERT INTO `jun_area` VALUES ('4009', '180', '黄陂区', '420116', '3');
INSERT INTO `jun_area` VALUES ('4010', '180', '新洲区', '420117', '3');
INSERT INTO `jun_area` VALUES ('4011', '184', '黄石港区', '420202', '3');
INSERT INTO `jun_area` VALUES ('4012', '184', '西塞山区', '420203', '3');
INSERT INTO `jun_area` VALUES ('4013', '184', '下陆区', '420204', '3');
INSERT INTO `jun_area` VALUES ('4014', '184', '铁山区', '420205', '3');
INSERT INTO `jun_area` VALUES ('4015', '184', '阳新县', '420222', '3');
INSERT INTO `jun_area` VALUES ('4016', '184', '大冶市', '420281', '3');
INSERT INTO `jun_area` VALUES ('4017', '189', '茅箭区', '420302', '3');
INSERT INTO `jun_area` VALUES ('4018', '189', '张湾区', '420303', '3');
INSERT INTO `jun_area` VALUES ('4019', '189', '郧县', '420321', '3');
INSERT INTO `jun_area` VALUES ('4020', '189', '郧西县', '420322', '3');
INSERT INTO `jun_area` VALUES ('4021', '189', '竹山县', '420323', '3');
INSERT INTO `jun_area` VALUES ('4022', '189', '竹溪县', '420324', '3');
INSERT INTO `jun_area` VALUES ('4023', '189', '房县', '420325', '3');
INSERT INTO `jun_area` VALUES ('4024', '189', '丹江口市', '420381', '3');
INSERT INTO `jun_area` VALUES ('4025', '195', '西陵区', '420502', '3');
INSERT INTO `jun_area` VALUES ('4026', '195', '伍家岗区', '420503', '3');
INSERT INTO `jun_area` VALUES ('4027', '195', '点军区', '420504', '3');
INSERT INTO `jun_area` VALUES ('4028', '195', '猇亭区', '420505', '3');
INSERT INTO `jun_area` VALUES ('4029', '195', '夷陵区', '420506', '3');
INSERT INTO `jun_area` VALUES ('4030', '195', '远安县', '420525', '3');
INSERT INTO `jun_area` VALUES ('4031', '195', '兴山县', '420526', '3');
INSERT INTO `jun_area` VALUES ('4032', '195', '秭归县', '420527', '3');
INSERT INTO `jun_area` VALUES ('4033', '195', '长阳土家族自治县', '420528', '3');
INSERT INTO `jun_area` VALUES ('4034', '195', '五峰土家族自治县', '420529', '3');
INSERT INTO `jun_area` VALUES ('4035', '195', '宜都市', '420581', '3');
INSERT INTO `jun_area` VALUES ('4036', '195', '当阳市', '420582', '3');
INSERT INTO `jun_area` VALUES ('4037', '195', '枝江市', '420583', '3');
INSERT INTO `jun_area` VALUES ('4038', '193', '襄城区', '420602', '3');
INSERT INTO `jun_area` VALUES ('4039', '193', '樊城区', '420606', '3');
INSERT INTO `jun_area` VALUES ('4040', '193', '襄州区', '420607', '3');
INSERT INTO `jun_area` VALUES ('4041', '193', '南漳县', '420624', '3');
INSERT INTO `jun_area` VALUES ('4042', '193', '谷城县', '420625', '3');
INSERT INTO `jun_area` VALUES ('4043', '193', '保康县', '420626', '3');
INSERT INTO `jun_area` VALUES ('4044', '193', '老河口市', '420682', '3');
INSERT INTO `jun_area` VALUES ('4045', '193', '枣阳市', '420683', '3');
INSERT INTO `jun_area` VALUES ('4046', '193', '宜城市', '420684', '3');
INSERT INTO `jun_area` VALUES ('4047', '182', '梁子湖区', '420702', '3');
INSERT INTO `jun_area` VALUES ('4048', '182', '华容区', '420703', '3');
INSERT INTO `jun_area` VALUES ('4049', '182', '鄂城区', '420704', '3');
INSERT INTO `jun_area` VALUES ('4050', '185', '东宝区', '420802', '3');
INSERT INTO `jun_area` VALUES ('4051', '185', '掇刀区', '420804', '3');
INSERT INTO `jun_area` VALUES ('4052', '185', '京山县', '420821', '3');
INSERT INTO `jun_area` VALUES ('4053', '185', '沙洋县', '420822', '3');
INSERT INTO `jun_area` VALUES ('4054', '185', '钟祥市', '420881', '3');
INSERT INTO `jun_area` VALUES ('4055', '194', '孝南区', '420902', '3');
INSERT INTO `jun_area` VALUES ('4056', '194', '孝昌县', '420921', '3');
INSERT INTO `jun_area` VALUES ('4057', '194', '大悟县', '420922', '3');
INSERT INTO `jun_area` VALUES ('4058', '194', '云梦县', '420923', '3');
INSERT INTO `jun_area` VALUES ('4059', '194', '应城市', '420981', '3');
INSERT INTO `jun_area` VALUES ('4060', '194', '安陆市', '420982', '3');
INSERT INTO `jun_area` VALUES ('4061', '194', '汉川市', '420984', '3');
INSERT INTO `jun_area` VALUES ('4062', '186', '沙市区', '421002', '3');
INSERT INTO `jun_area` VALUES ('4063', '186', '荆州区', '421003', '3');
INSERT INTO `jun_area` VALUES ('4064', '186', '公安县', '421022', '3');
INSERT INTO `jun_area` VALUES ('4065', '186', '监利县', '421023', '3');
INSERT INTO `jun_area` VALUES ('4066', '186', '江陵县', '421024', '3');
INSERT INTO `jun_area` VALUES ('4067', '186', '石首市', '421081', '3');
INSERT INTO `jun_area` VALUES ('4068', '186', '洪湖市', '421083', '3');
INSERT INTO `jun_area` VALUES ('4069', '186', '松滋市', '421087', '3');
INSERT INTO `jun_area` VALUES ('4070', '183', '黄州区', '421102', '3');
INSERT INTO `jun_area` VALUES ('4071', '183', '团风县', '421121', '3');
INSERT INTO `jun_area` VALUES ('4072', '183', '红安县', '421122', '3');
INSERT INTO `jun_area` VALUES ('4073', '183', '罗田县', '421123', '3');
INSERT INTO `jun_area` VALUES ('4074', '183', '英山县', '421124', '3');
INSERT INTO `jun_area` VALUES ('4075', '183', '浠水县', '421125', '3');
INSERT INTO `jun_area` VALUES ('4076', '183', '蕲春县', '421126', '3');
INSERT INTO `jun_area` VALUES ('4077', '183', '黄梅县', '421127', '3');
INSERT INTO `jun_area` VALUES ('4078', '183', '麻城市', '421181', '3');
INSERT INTO `jun_area` VALUES ('4079', '183', '武穴市', '421182', '3');
INSERT INTO `jun_area` VALUES ('4080', '192', '咸安区', '421202', '3');
INSERT INTO `jun_area` VALUES ('4081', '192', '嘉鱼县', '421221', '3');
INSERT INTO `jun_area` VALUES ('4082', '192', '通城县', '421222', '3');
INSERT INTO `jun_area` VALUES ('4083', '192', '崇阳县', '421223', '3');
INSERT INTO `jun_area` VALUES ('4084', '192', '通山县', '421224', '3');
INSERT INTO `jun_area` VALUES ('4085', '192', '赤壁市', '421281', '3');
INSERT INTO `jun_area` VALUES ('4086', '190', '曾都区', '421303', '3');
INSERT INTO `jun_area` VALUES ('4087', '190', '广水市', '421381', '3');
INSERT INTO `jun_area` VALUES ('4088', '197', '芙蓉区', '430102', '3');
INSERT INTO `jun_area` VALUES ('4089', '197', '天心区', '430103', '3');
INSERT INTO `jun_area` VALUES ('4090', '197', '岳麓区', '430104', '3');
INSERT INTO `jun_area` VALUES ('4091', '197', '开福区', '430105', '3');
INSERT INTO `jun_area` VALUES ('4092', '197', '雨花区', '430111', '3');
INSERT INTO `jun_area` VALUES ('4093', '197', '长沙县', '430121', '3');
INSERT INTO `jun_area` VALUES ('4094', '197', '望城县', '430112', '3');
INSERT INTO `jun_area` VALUES ('4095', '197', '宁乡县', '430124', '3');
INSERT INTO `jun_area` VALUES ('4096', '197', '浏阳市', '430181', '3');
INSERT INTO `jun_area` VALUES ('4097', '210', '荷塘区', '430202', '3');
INSERT INTO `jun_area` VALUES ('4098', '210', '芦淞区', '430203', '3');
INSERT INTO `jun_area` VALUES ('4099', '210', '石峰区', '430204', '3');
INSERT INTO `jun_area` VALUES ('4100', '210', '天元区', '430211', '3');
INSERT INTO `jun_area` VALUES ('4101', '210', '株洲县', '430221', '3');
INSERT INTO `jun_area` VALUES ('4102', '210', '攸县', '430223', '3');
INSERT INTO `jun_area` VALUES ('4103', '210', '茶陵县', '430224', '3');
INSERT INTO `jun_area` VALUES ('4104', '210', '炎陵县', '430225', '3');
INSERT INTO `jun_area` VALUES ('4105', '210', '醴陵市', '430281', '3');
INSERT INTO `jun_area` VALUES ('4106', '205', '雨湖区', '430302', '3');
INSERT INTO `jun_area` VALUES ('4107', '205', '岳塘区', '430304', '3');
INSERT INTO `jun_area` VALUES ('4108', '205', '湘潭县', '430321', '3');
INSERT INTO `jun_area` VALUES ('4109', '205', '湘乡市', '430381', '3');
INSERT INTO `jun_area` VALUES ('4110', '205', '韶山市', '430382', '3');
INSERT INTO `jun_area` VALUES ('4111', '201', '珠晖区', '430405', '3');
INSERT INTO `jun_area` VALUES ('4112', '201', '雁峰区', '430406', '3');
INSERT INTO `jun_area` VALUES ('4113', '201', '石鼓区', '430407', '3');
INSERT INTO `jun_area` VALUES ('4114', '201', '蒸湘区', '430408', '3');
INSERT INTO `jun_area` VALUES ('4115', '201', '南岳区', '430412', '3');
INSERT INTO `jun_area` VALUES ('4116', '201', '衡阳县', '430421', '3');
INSERT INTO `jun_area` VALUES ('4117', '201', '衡南县', '430422', '3');
INSERT INTO `jun_area` VALUES ('4118', '201', '衡山县', '430423', '3');
INSERT INTO `jun_area` VALUES ('4119', '201', '衡东县', '430424', '3');
INSERT INTO `jun_area` VALUES ('4120', '201', '祁东县', '430426', '3');
INSERT INTO `jun_area` VALUES ('4121', '201', '耒阳市', '430481', '3');
INSERT INTO `jun_area` VALUES ('4122', '201', '常宁市', '430482', '3');
INSERT INTO `jun_area` VALUES ('4123', '204', '双清区', '430502', '3');
INSERT INTO `jun_area` VALUES ('4124', '204', '大祥区', '430503', '3');
INSERT INTO `jun_area` VALUES ('4125', '204', '北塔区', '430511', '3');
INSERT INTO `jun_area` VALUES ('4126', '204', '邵东县', '430521', '3');
INSERT INTO `jun_area` VALUES ('4127', '204', '新邵县', '430522', '3');
INSERT INTO `jun_area` VALUES ('4128', '204', '邵阳县', '430523', '3');
INSERT INTO `jun_area` VALUES ('4129', '204', '隆回县', '430524', '3');
INSERT INTO `jun_area` VALUES ('4130', '204', '洞口县', '430525', '3');
INSERT INTO `jun_area` VALUES ('4131', '204', '绥宁县', '430527', '3');
INSERT INTO `jun_area` VALUES ('4132', '204', '新宁县', '430528', '3');
INSERT INTO `jun_area` VALUES ('4133', '204', '城步苗族自治县', '430529', '3');
INSERT INTO `jun_area` VALUES ('4134', '204', '武冈市', '430581', '3');
INSERT INTO `jun_area` VALUES ('4135', '209', '岳阳楼区', '430602', '3');
INSERT INTO `jun_area` VALUES ('4136', '209', '云溪区', '430603', '3');
INSERT INTO `jun_area` VALUES ('4137', '209', '君山区', '430611', '3');
INSERT INTO `jun_area` VALUES ('4138', '209', '岳阳县', '430621', '3');
INSERT INTO `jun_area` VALUES ('4139', '209', '华容县', '430623', '3');
INSERT INTO `jun_area` VALUES ('4140', '209', '湘阴县', '430624', '3');
INSERT INTO `jun_area` VALUES ('4141', '209', '平江县', '430626', '3');
INSERT INTO `jun_area` VALUES ('4142', '209', '汨罗市', '430681', '3');
INSERT INTO `jun_area` VALUES ('4143', '209', '临湘市', '430682', '3');
INSERT INTO `jun_area` VALUES ('4144', '199', '武陵区', '430702', '3');
INSERT INTO `jun_area` VALUES ('4145', '199', '鼎城区', '430703', '3');
INSERT INTO `jun_area` VALUES ('4146', '199', '安乡县', '430721', '3');
INSERT INTO `jun_area` VALUES ('4147', '199', '汉寿县', '430722', '3');
INSERT INTO `jun_area` VALUES ('4148', '199', '澧县', '430723', '3');
INSERT INTO `jun_area` VALUES ('4149', '199', '临澧县', '430724', '3');
INSERT INTO `jun_area` VALUES ('4150', '199', '桃源县', '430725', '3');
INSERT INTO `jun_area` VALUES ('4151', '199', '石门县', '430726', '3');
INSERT INTO `jun_area` VALUES ('4152', '199', '津市市', '430781', '3');
INSERT INTO `jun_area` VALUES ('4153', '198', '永定区', '430802', '3');
INSERT INTO `jun_area` VALUES ('4154', '198', '武陵源区', '430811', '3');
INSERT INTO `jun_area` VALUES ('4155', '198', '慈利县', '430821', '3');
INSERT INTO `jun_area` VALUES ('4156', '198', '桑植县', '430822', '3');
INSERT INTO `jun_area` VALUES ('4157', '207', '资阳区', '430902', '3');
INSERT INTO `jun_area` VALUES ('4158', '207', '赫山区', '430903', '3');
INSERT INTO `jun_area` VALUES ('4159', '207', '南县', '430921', '3');
INSERT INTO `jun_area` VALUES ('4160', '207', '桃江县', '430922', '3');
INSERT INTO `jun_area` VALUES ('4161', '207', '安化县', '430923', '3');
INSERT INTO `jun_area` VALUES ('4162', '207', '沅江市', '430981', '3');
INSERT INTO `jun_area` VALUES ('4163', '200', '北湖区', '431002', '3');
INSERT INTO `jun_area` VALUES ('4164', '200', '苏仙区', '431003', '3');
INSERT INTO `jun_area` VALUES ('4165', '200', '桂阳县', '431021', '3');
INSERT INTO `jun_area` VALUES ('4166', '200', '宜章县', '431022', '3');
INSERT INTO `jun_area` VALUES ('4167', '200', '永兴县', '431023', '3');
INSERT INTO `jun_area` VALUES ('4168', '200', '嘉禾县', '431024', '3');
INSERT INTO `jun_area` VALUES ('4169', '200', '临武县', '431025', '3');
INSERT INTO `jun_area` VALUES ('4170', '200', '汝城县', '431026', '3');
INSERT INTO `jun_area` VALUES ('4171', '200', '桂东县', '431027', '3');
INSERT INTO `jun_area` VALUES ('4172', '200', '安仁县', '431028', '3');
INSERT INTO `jun_area` VALUES ('4173', '200', '资兴市', '431081', '3');
INSERT INTO `jun_area` VALUES ('4174', '208', '零陵区', '431102', '3');
INSERT INTO `jun_area` VALUES ('4175', '208', '冷水滩区', '431103', '3');
INSERT INTO `jun_area` VALUES ('4176', '208', '祁阳县', '431121', '3');
INSERT INTO `jun_area` VALUES ('4177', '208', '东安县', '431122', '3');
INSERT INTO `jun_area` VALUES ('4178', '208', '双牌县', '431123', '3');
INSERT INTO `jun_area` VALUES ('4179', '208', '道县', '431124', '3');
INSERT INTO `jun_area` VALUES ('4180', '208', '江永县', '431125', '3');
INSERT INTO `jun_area` VALUES ('4181', '208', '宁远县', '431126', '3');
INSERT INTO `jun_area` VALUES ('4182', '208', '蓝山县', '431127', '3');
INSERT INTO `jun_area` VALUES ('4183', '208', '新田县', '431128', '3');
INSERT INTO `jun_area` VALUES ('4184', '208', '江华瑶族自治县', '431129', '3');
INSERT INTO `jun_area` VALUES ('4185', '202', '鹤城区', '431202', '3');
INSERT INTO `jun_area` VALUES ('4186', '202', '中方县', '431221', '3');
INSERT INTO `jun_area` VALUES ('4187', '202', '沅陵县', '431222', '3');
INSERT INTO `jun_area` VALUES ('4188', '202', '辰溪县', '431223', '3');
INSERT INTO `jun_area` VALUES ('4189', '202', '溆浦县', '431224', '3');
INSERT INTO `jun_area` VALUES ('4190', '202', '会同县', '431225', '3');
INSERT INTO `jun_area` VALUES ('4191', '202', '麻阳苗族自治县', '431226', '3');
INSERT INTO `jun_area` VALUES ('4192', '202', '新晃侗族自治县', '431227', '3');
INSERT INTO `jun_area` VALUES ('4193', '202', '芷江侗族自治县', '431228', '3');
INSERT INTO `jun_area` VALUES ('4194', '202', '靖州苗族侗族自治县', '431229', '3');
INSERT INTO `jun_area` VALUES ('4195', '202', '通道侗族自治县', '431230', '3');
INSERT INTO `jun_area` VALUES ('4196', '202', '洪江市', '431281', '3');
INSERT INTO `jun_area` VALUES ('4197', '203', '娄星区', '431302', '3');
INSERT INTO `jun_area` VALUES ('4198', '203', '双峰县', '431321', '3');
INSERT INTO `jun_area` VALUES ('4199', '203', '新化县', '431322', '3');
INSERT INTO `jun_area` VALUES ('4200', '203', '冷水江市', '431381', '3');
INSERT INTO `jun_area` VALUES ('4201', '203', '涟源市', '431382', '3');
INSERT INTO `jun_area` VALUES ('4202', '76', '荔湾区', '440103', '3');
INSERT INTO `jun_area` VALUES ('4203', '76', '越秀区', '440104', '3');
INSERT INTO `jun_area` VALUES ('4204', '76', '海珠区', '440105', '3');
INSERT INTO `jun_area` VALUES ('4205', '76', '天河区', '440106', '3');
INSERT INTO `jun_area` VALUES ('4206', '76', '白云区', '440111', '3');
INSERT INTO `jun_area` VALUES ('4207', '76', '黄埔区', '440112', '3');
INSERT INTO `jun_area` VALUES ('4208', '76', '番禺区', '440113', '3');
INSERT INTO `jun_area` VALUES ('4209', '76', '花都区', '440114', '3');
INSERT INTO `jun_area` VALUES ('4210', '76', '南沙区', '440115', '3');
INSERT INTO `jun_area` VALUES ('4212', '76', '增城区', '440118', '3');
INSERT INTO `jun_area` VALUES ('4213', '76', '从化区', '440117', '3');
INSERT INTO `jun_area` VALUES ('4214', '90', '武江区', '440203', '3');
INSERT INTO `jun_area` VALUES ('4215', '90', '浈江区', '440204', '3');
INSERT INTO `jun_area` VALUES ('4216', '90', '曲江区', '440205', '3');
INSERT INTO `jun_area` VALUES ('4217', '90', '始兴县', '440222', '3');
INSERT INTO `jun_area` VALUES ('4218', '90', '仁化县', '440224', '3');
INSERT INTO `jun_area` VALUES ('4219', '90', '翁源县', '440229', '3');
INSERT INTO `jun_area` VALUES ('4220', '90', '乳源瑶族自治县', '440232', '3');
INSERT INTO `jun_area` VALUES ('4221', '90', '新丰县', '440233', '3');
INSERT INTO `jun_area` VALUES ('4222', '90', '乐昌市', '440281', '3');
INSERT INTO `jun_area` VALUES ('4223', '90', '南雄市', '440282', '3');
INSERT INTO `jun_area` VALUES ('4224', '77', '罗湖区', '440303', '3');
INSERT INTO `jun_area` VALUES ('4225', '77', '福田区', '440304', '3');
INSERT INTO `jun_area` VALUES ('4226', '77', '南山区', '440305', '3');
INSERT INTO `jun_area` VALUES ('4227', '77', '宝安区', '440306', '3');
INSERT INTO `jun_area` VALUES ('4228', '77', '龙岗区', '440307', '3');
INSERT INTO `jun_area` VALUES ('4229', '77', '盐田区', '440308', '3');
INSERT INTO `jun_area` VALUES ('4230', '96', '香洲区', '440402', '3');
INSERT INTO `jun_area` VALUES ('4231', '96', '斗门区', '440403', '3');
INSERT INTO `jun_area` VALUES ('4232', '96', '金湾区', '440404', '3');
INSERT INTO `jun_area` VALUES ('4233', '88', '龙湖区', '440507', '3');
INSERT INTO `jun_area` VALUES ('4234', '88', '金平区', '440511', '3');
INSERT INTO `jun_area` VALUES ('4235', '88', '濠江区', '440512', '3');
INSERT INTO `jun_area` VALUES ('4236', '88', '潮阳区', '440513', '3');
INSERT INTO `jun_area` VALUES ('4237', '88', '潮南区', '440514', '3');
INSERT INTO `jun_area` VALUES ('4238', '88', '澄海区', '440515', '3');
INSERT INTO `jun_area` VALUES ('4239', '88', '南澳县', '440523', '3');
INSERT INTO `jun_area` VALUES ('4240', '80', '禅城区', '440604', '3');
INSERT INTO `jun_area` VALUES ('4241', '80', '南海区', '440605', '3');
INSERT INTO `jun_area` VALUES ('4242', '80', '顺德区', '440606', '3');
INSERT INTO `jun_area` VALUES ('4243', '80', '三水区', '440607', '3');
INSERT INTO `jun_area` VALUES ('4244', '80', '高明区', '440608', '3');
INSERT INTO `jun_area` VALUES ('4245', '83', '蓬江区', '440703', '3');
INSERT INTO `jun_area` VALUES ('4246', '83', '江海区', '440704', '3');
INSERT INTO `jun_area` VALUES ('4247', '83', '新会区', '440705', '3');
INSERT INTO `jun_area` VALUES ('4248', '83', '台山市', '440781', '3');
INSERT INTO `jun_area` VALUES ('4249', '83', '开平市', '440783', '3');
INSERT INTO `jun_area` VALUES ('4250', '83', '鹤山市', '440784', '3');
INSERT INTO `jun_area` VALUES ('4251', '83', '恩平市', '440785', '3');
INSERT INTO `jun_area` VALUES ('4252', '93', '赤坎区', '440802', '3');
INSERT INTO `jun_area` VALUES ('4253', '93', '霞山区', '440803', '3');
INSERT INTO `jun_area` VALUES ('4254', '93', '坡头区', '440804', '3');
INSERT INTO `jun_area` VALUES ('4255', '93', '麻章区', '440811', '3');
INSERT INTO `jun_area` VALUES ('4256', '93', '遂溪县', '440823', '3');
INSERT INTO `jun_area` VALUES ('4257', '93', '徐闻县', '440825', '3');
INSERT INTO `jun_area` VALUES ('4258', '93', '廉江市', '440881', '3');
INSERT INTO `jun_area` VALUES ('4259', '93', '雷州市', '440882', '3');
INSERT INTO `jun_area` VALUES ('4260', '93', '吴川市', '440883', '3');
INSERT INTO `jun_area` VALUES ('4261', '85', '茂南区', '440902', '3');
INSERT INTO `jun_area` VALUES ('4263', '85', '电白区', '440904', '3');
INSERT INTO `jun_area` VALUES ('4264', '85', '高州市', '440981', '3');
INSERT INTO `jun_area` VALUES ('4265', '85', '化州市', '440982', '3');
INSERT INTO `jun_area` VALUES ('4266', '85', '信宜市', '440983', '3');
INSERT INTO `jun_area` VALUES ('4267', '94', '端州区', '441202', '3');
INSERT INTO `jun_area` VALUES ('4268', '94', '鼎湖区', '441203', '3');
INSERT INTO `jun_area` VALUES ('4269', '94', '广宁县', '441223', '3');
INSERT INTO `jun_area` VALUES ('4270', '94', '怀集县', '441224', '3');
INSERT INTO `jun_area` VALUES ('4271', '94', '封开县', '441225', '3');
INSERT INTO `jun_area` VALUES ('4272', '94', '德庆县', '441226', '3');
INSERT INTO `jun_area` VALUES ('4273', '94', '高要区', '441204', '3');
INSERT INTO `jun_area` VALUES ('4274', '94', '四会市', '441284', '3');
INSERT INTO `jun_area` VALUES ('4275', '82', '惠城区', '441302', '3');
INSERT INTO `jun_area` VALUES ('4276', '82', '惠阳区', '441303', '3');
INSERT INTO `jun_area` VALUES ('4277', '82', '博罗县', '441322', '3');
INSERT INTO `jun_area` VALUES ('4278', '82', '惠东县', '441323', '3');
INSERT INTO `jun_area` VALUES ('4279', '82', '龙门县', '441324', '3');
INSERT INTO `jun_area` VALUES ('4280', '86', '梅江区', '441402', '3');
INSERT INTO `jun_area` VALUES ('4281', '86', '梅县区', '441403', '3');
INSERT INTO `jun_area` VALUES ('4282', '86', '大埔县', '441422', '3');
INSERT INTO `jun_area` VALUES ('4283', '86', '丰顺县', '441423', '3');
INSERT INTO `jun_area` VALUES ('4284', '86', '五华县', '441424', '3');
INSERT INTO `jun_area` VALUES ('4285', '86', '平远县', '441426', '3');
INSERT INTO `jun_area` VALUES ('4286', '86', '蕉岭县', '441427', '3');
INSERT INTO `jun_area` VALUES ('4287', '86', '兴宁市', '441481', '3');
INSERT INTO `jun_area` VALUES ('4288', '89', '城区', '441502', '3');
INSERT INTO `jun_area` VALUES ('4289', '89', '海丰县', '441521', '3');
INSERT INTO `jun_area` VALUES ('4290', '89', '陆河县', '441523', '3');
INSERT INTO `jun_area` VALUES ('4291', '89', '陆丰市', '441581', '3');
INSERT INTO `jun_area` VALUES ('4292', '81', '源城区', '441602', '3');
INSERT INTO `jun_area` VALUES ('4293', '81', '紫金县', '441621', '3');
INSERT INTO `jun_area` VALUES ('4294', '81', '龙川县', '441622', '3');
INSERT INTO `jun_area` VALUES ('4295', '81', '连平县', '441623', '3');
INSERT INTO `jun_area` VALUES ('4296', '81', '和平县', '441624', '3');
INSERT INTO `jun_area` VALUES ('4297', '81', '东源县', '441625', '3');
INSERT INTO `jun_area` VALUES ('4298', '91', '江城区', '441702', '3');
INSERT INTO `jun_area` VALUES ('4299', '91', '阳西县', '441721', '3');
INSERT INTO `jun_area` VALUES ('4300', '91', '阳东区', '441704', '3');
INSERT INTO `jun_area` VALUES ('4301', '91', '阳春市', '441781', '3');
INSERT INTO `jun_area` VALUES ('4302', '87', '清城区', '441802', '3');
INSERT INTO `jun_area` VALUES ('4303', '87', '佛冈县', '441821', '3');
INSERT INTO `jun_area` VALUES ('4304', '87', '阳山县', '441823', '3');
INSERT INTO `jun_area` VALUES ('4305', '87', '连山壮族瑶族自治县', '441825', '3');
INSERT INTO `jun_area` VALUES ('4306', '87', '连南瑶族自治县', '441826', '3');
INSERT INTO `jun_area` VALUES ('4307', '87', '清新区', '441803', '3');
INSERT INTO `jun_area` VALUES ('4308', '87', '英德市', '441881', '3');
INSERT INTO `jun_area` VALUES ('4309', '87', '连州市', '441882', '3');
INSERT INTO `jun_area` VALUES ('4312', '78', '湘桥区', '445102', '3');
INSERT INTO `jun_area` VALUES ('4313', '78', '潮安区', '445103', '3');
INSERT INTO `jun_area` VALUES ('4314', '78', '饶平县', '445122', '3');
INSERT INTO `jun_area` VALUES ('4315', '84', '榕城区', '445202', '3');
INSERT INTO `jun_area` VALUES ('4316', '84', '揭东区', '445203', '3');
INSERT INTO `jun_area` VALUES ('4317', '84', '揭西县', '445222', '3');
INSERT INTO `jun_area` VALUES ('4318', '84', '惠来县', '445224', '3');
INSERT INTO `jun_area` VALUES ('4319', '84', '普宁市', '445281', '3');
INSERT INTO `jun_area` VALUES ('4320', '92', '云城区', '445302', '3');
INSERT INTO `jun_area` VALUES ('4321', '92', '新兴县', '445321', '3');
INSERT INTO `jun_area` VALUES ('4322', '92', '郁南县', '445322', '3');
INSERT INTO `jun_area` VALUES ('4323', '92', '云安区', '445303', '3');
INSERT INTO `jun_area` VALUES ('4324', '92', '罗定市', '445381', '3');
INSERT INTO `jun_area` VALUES ('4325', '97', '兴宁区', '450102', '3');
INSERT INTO `jun_area` VALUES ('4326', '97', '青秀区', '450103', '3');
INSERT INTO `jun_area` VALUES ('4327', '97', '江南区', '450105', '3');
INSERT INTO `jun_area` VALUES ('4328', '97', '西乡塘区', '450107', '3');
INSERT INTO `jun_area` VALUES ('4329', '97', '良庆区', '450108', '3');
INSERT INTO `jun_area` VALUES ('4330', '97', '邕宁区', '450109', '3');
INSERT INTO `jun_area` VALUES ('4331', '97', '武鸣区', '450110', '3');
INSERT INTO `jun_area` VALUES ('4332', '97', '隆安县', '450123', '3');
INSERT INTO `jun_area` VALUES ('4333', '97', '马山县', '450124', '3');
INSERT INTO `jun_area` VALUES ('4334', '97', '上林县', '450125', '3');
INSERT INTO `jun_area` VALUES ('4335', '97', '宾阳县', '450126', '3');
INSERT INTO `jun_area` VALUES ('4336', '97', '横县', '450127', '3');
INSERT INTO `jun_area` VALUES ('4337', '107', '城中区', '450202', '3');
INSERT INTO `jun_area` VALUES ('4338', '107', '鱼峰区', '450203', '3');
INSERT INTO `jun_area` VALUES ('4339', '107', '柳南区', '450204', '3');
INSERT INTO `jun_area` VALUES ('4340', '107', '柳北区', '450205', '3');
INSERT INTO `jun_area` VALUES ('4341', '107', '柳江县', '450221', '3');
INSERT INTO `jun_area` VALUES ('4342', '107', '柳城县', '450222', '3');
INSERT INTO `jun_area` VALUES ('4343', '107', '鹿寨县', '450223', '3');
INSERT INTO `jun_area` VALUES ('4344', '107', '融安县', '450224', '3');
INSERT INTO `jun_area` VALUES ('4345', '107', '融水苗族自治县', '450225', '3');
INSERT INTO `jun_area` VALUES ('4346', '107', '三江侗族自治县', '450226', '3');
INSERT INTO `jun_area` VALUES ('4347', '98', '秀峰区', '450302', '3');
INSERT INTO `jun_area` VALUES ('4348', '98', '叠彩区', '450303', '3');
INSERT INTO `jun_area` VALUES ('4349', '98', '象山区', '450304', '3');
INSERT INTO `jun_area` VALUES ('4350', '98', '七星区', '450305', '3');
INSERT INTO `jun_area` VALUES ('4351', '98', '雁山区', '450311', '3');
INSERT INTO `jun_area` VALUES ('4352', '98', '阳朔县', '450321', '3');
INSERT INTO `jun_area` VALUES ('4353', '98', '临桂区', '450312', '3');
INSERT INTO `jun_area` VALUES ('4354', '98', '灵川县', '450323', '3');
INSERT INTO `jun_area` VALUES ('4355', '98', '全州县', '450324', '3');
INSERT INTO `jun_area` VALUES ('4356', '98', '兴安县', '450325', '3');
INSERT INTO `jun_area` VALUES ('4357', '98', '永福县', '450326', '3');
INSERT INTO `jun_area` VALUES ('4358', '98', '灌阳县', '450327', '3');
INSERT INTO `jun_area` VALUES ('4359', '98', '龙胜各族自治县', '450328', '3');
INSERT INTO `jun_area` VALUES ('4360', '98', '资源县', '450329', '3');
INSERT INTO `jun_area` VALUES ('4361', '98', '平乐县', '450330', '3');
INSERT INTO `jun_area` VALUES ('4362', '98', '荔蒲县', '450331', '3');
INSERT INTO `jun_area` VALUES ('4363', '98', '恭城瑶族自治县', '450332', '3');
INSERT INTO `jun_area` VALUES ('4364', '109', '万秀区', '450403', '3');
INSERT INTO `jun_area` VALUES ('4366', '109', '长洲区', '450405', '3');
INSERT INTO `jun_area` VALUES ('4367', '109', '苍梧县', '450421', '3');
INSERT INTO `jun_area` VALUES ('4368', '109', '藤县', '450422', '3');
INSERT INTO `jun_area` VALUES ('4369', '109', '蒙山县', '450423', '3');
INSERT INTO `jun_area` VALUES ('4370', '109', '岑溪市', '450481', '3');
INSERT INTO `jun_area` VALUES ('4371', '100', '海城区', '450502', '3');
INSERT INTO `jun_area` VALUES ('4372', '100', '银海区', '450503', '3');
INSERT INTO `jun_area` VALUES ('4373', '100', '铁山港区', '450512', '3');
INSERT INTO `jun_area` VALUES ('4374', '100', '合浦县', '450521', '3');
INSERT INTO `jun_area` VALUES ('4375', '102', '港口区', '450602', '3');
INSERT INTO `jun_area` VALUES ('4376', '102', '防城区', '450603', '3');
INSERT INTO `jun_area` VALUES ('4377', '102', '上思县', '450621', '3');
INSERT INTO `jun_area` VALUES ('4378', '102', '东兴市', '450681', '3');
INSERT INTO `jun_area` VALUES ('4379', '108', '钦南区', '450702', '3');
INSERT INTO `jun_area` VALUES ('4380', '108', '钦北区', '450703', '3');
INSERT INTO `jun_area` VALUES ('4381', '108', '灵山县', '450721', '3');
INSERT INTO `jun_area` VALUES ('4382', '108', '浦北县', '450722', '3');
INSERT INTO `jun_area` VALUES ('4383', '103', '港北区', '450802', '3');
INSERT INTO `jun_area` VALUES ('4384', '103', '港南区', '450803', '3');
INSERT INTO `jun_area` VALUES ('4385', '103', '覃塘区', '450804', '3');
INSERT INTO `jun_area` VALUES ('4386', '103', '平南县', '450821', '3');
INSERT INTO `jun_area` VALUES ('4387', '103', '桂平市', '450881', '3');
INSERT INTO `jun_area` VALUES ('4388', '110', '玉州区', '450902', '3');
INSERT INTO `jun_area` VALUES ('4389', '110', '容县', '450921', '3');
INSERT INTO `jun_area` VALUES ('4390', '110', '陆川县', '450922', '3');
INSERT INTO `jun_area` VALUES ('4391', '110', '博白县', '450923', '3');
INSERT INTO `jun_area` VALUES ('4392', '110', '兴业县', '450924', '3');
INSERT INTO `jun_area` VALUES ('4393', '110', '北流市', '450981', '3');
INSERT INTO `jun_area` VALUES ('4394', '99', '右江区', '451002', '3');
INSERT INTO `jun_area` VALUES ('4395', '99', '田阳县', '451021', '3');
INSERT INTO `jun_area` VALUES ('4396', '99', '田东县', '451022', '3');
INSERT INTO `jun_area` VALUES ('4397', '99', '平果县', '451023', '3');
INSERT INTO `jun_area` VALUES ('4398', '99', '德保县', '451024', '3');
INSERT INTO `jun_area` VALUES ('4400', '99', '那坡县', '451026', '3');
INSERT INTO `jun_area` VALUES ('4401', '99', '凌云县', '451027', '3');
INSERT INTO `jun_area` VALUES ('4402', '99', '乐业县', '451028', '3');
INSERT INTO `jun_area` VALUES ('4403', '99', '田林县', '451029', '3');
INSERT INTO `jun_area` VALUES ('4404', '99', '西林县', '451030', '3');
INSERT INTO `jun_area` VALUES ('4405', '99', '隆林各族自治县', '451031', '3');
INSERT INTO `jun_area` VALUES ('4406', '105', '八步区', '451102', '3');
INSERT INTO `jun_area` VALUES ('4407', '105', '昭平县', '451121', '3');
INSERT INTO `jun_area` VALUES ('4408', '105', '钟山县', '451122', '3');
INSERT INTO `jun_area` VALUES ('4409', '105', '富川瑶族自治县', '451123', '3');
INSERT INTO `jun_area` VALUES ('4410', '104', '金城江区', '451202', '3');
INSERT INTO `jun_area` VALUES ('4411', '104', '南丹县', '451221', '3');
INSERT INTO `jun_area` VALUES ('4412', '104', '天峨县', '451222', '3');
INSERT INTO `jun_area` VALUES ('4413', '104', '凤山县', '451223', '3');
INSERT INTO `jun_area` VALUES ('4414', '104', '东兰县', '451224', '3');
INSERT INTO `jun_area` VALUES ('4415', '104', '罗城仫佬族自治县', '451225', '3');
INSERT INTO `jun_area` VALUES ('4416', '104', '环江毛南族自治县', '451226', '3');
INSERT INTO `jun_area` VALUES ('4417', '104', '巴马瑶族自治县', '451227', '3');
INSERT INTO `jun_area` VALUES ('4418', '104', '都安瑶族自治县', '451228', '3');
INSERT INTO `jun_area` VALUES ('4419', '104', '大化瑶族自治县', '451229', '3');
INSERT INTO `jun_area` VALUES ('4420', '104', '宜州市', '451281', '3');
INSERT INTO `jun_area` VALUES ('4421', '106', '兴宾区', '451302', '3');
INSERT INTO `jun_area` VALUES ('4422', '106', '忻城县', '451321', '3');
INSERT INTO `jun_area` VALUES ('4423', '106', '象州县', '451322', '3');
INSERT INTO `jun_area` VALUES ('4424', '106', '武宣县', '451323', '3');
INSERT INTO `jun_area` VALUES ('4425', '106', '金秀瑶族自治县', '451324', '3');
INSERT INTO `jun_area` VALUES ('4426', '106', '合山市', '451381', '3');
INSERT INTO `jun_area` VALUES ('4427', '101', '江洲区', '451402', '3');
INSERT INTO `jun_area` VALUES ('4428', '101', '扶绥县', '451421', '3');
INSERT INTO `jun_area` VALUES ('4429', '101', '宁明县', '451422', '3');
INSERT INTO `jun_area` VALUES ('4430', '101', '龙州县', '451423', '3');
INSERT INTO `jun_area` VALUES ('4431', '101', '大新县', '451424', '3');
INSERT INTO `jun_area` VALUES ('4432', '101', '天等县', '451425', '3');
INSERT INTO `jun_area` VALUES ('4433', '101', '凭祥市', '451481', '3');
INSERT INTO `jun_area` VALUES ('4434', '120', '秀英区', '460105', '3');
INSERT INTO `jun_area` VALUES ('4435', '120', '龙华区', '460106', '3');
INSERT INTO `jun_area` VALUES ('4436', '120', '琼山区', '460107', '3');
INSERT INTO `jun_area` VALUES ('4437', '120', '美兰区', '460108', '3');
INSERT INTO `jun_area` VALUES ('4438', '322', '锦江区', '510104', '3');
INSERT INTO `jun_area` VALUES ('4439', '322', '青羊区', '510105', '3');
INSERT INTO `jun_area` VALUES ('4440', '322', '金牛区', '510106', '3');
INSERT INTO `jun_area` VALUES ('4441', '322', '武侯区', '510107', '3');
INSERT INTO `jun_area` VALUES ('4442', '322', '成华区', '510108', '3');
INSERT INTO `jun_area` VALUES ('4443', '322', '龙泉驿区', '510112', '3');
INSERT INTO `jun_area` VALUES ('4444', '322', '青白江区', '510113', '3');
INSERT INTO `jun_area` VALUES ('4445', '322', '新都区', '510114', '3');
INSERT INTO `jun_area` VALUES ('4446', '322', '温江区', '510115', '3');
INSERT INTO `jun_area` VALUES ('4447', '322', '金堂县', '510121', '3');
INSERT INTO `jun_area` VALUES ('4448', '322', '双流县', '510122', '3');
INSERT INTO `jun_area` VALUES ('4449', '322', '郫县', '510124', '3');
INSERT INTO `jun_area` VALUES ('4450', '322', '大邑县', '510129', '3');
INSERT INTO `jun_area` VALUES ('4451', '322', '蒲江县', '510131', '3');
INSERT INTO `jun_area` VALUES ('4452', '322', '新津县', '510132', '3');
INSERT INTO `jun_area` VALUES ('4453', '322', '都江堰市', '510181', '3');
INSERT INTO `jun_area` VALUES ('4454', '322', '彭州市', '510182', '3');
INSERT INTO `jun_area` VALUES ('4455', '322', '邛崃市', '510183', '3');
INSERT INTO `jun_area` VALUES ('4456', '322', '崇州市', '510184', '3');
INSERT INTO `jun_area` VALUES ('4457', '341', '自流井区', '510302', '3');
INSERT INTO `jun_area` VALUES ('4458', '341', '贡井区', '510303', '3');
INSERT INTO `jun_area` VALUES ('4459', '341', '大安区', '510304', '3');
INSERT INTO `jun_area` VALUES ('4460', '341', '沿滩区', '510311', '3');
INSERT INTO `jun_area` VALUES ('4461', '341', '荣县', '510321', '3');
INSERT INTO `jun_area` VALUES ('4462', '341', '富顺县', '510322', '3');
INSERT INTO `jun_area` VALUES ('4463', '336', '东区', '510402', '3');
INSERT INTO `jun_area` VALUES ('4464', '336', '西区', '510403', '3');
INSERT INTO `jun_area` VALUES ('4465', '336', '仁和区', '510411', '3');
INSERT INTO `jun_area` VALUES ('4466', '336', '米易县', '510421', '3');
INSERT INTO `jun_area` VALUES ('4467', '336', '盐边县', '510422', '3');
INSERT INTO `jun_area` VALUES ('4468', '342', '江阳区', '510502', '3');
INSERT INTO `jun_area` VALUES ('4469', '342', '纳溪区', '510503', '3');
INSERT INTO `jun_area` VALUES ('4470', '342', '龙马潭区', '510504', '3');
INSERT INTO `jun_area` VALUES ('4471', '342', '泸县', '510521', '3');
INSERT INTO `jun_area` VALUES ('4472', '342', '合江县', '510522', '3');
INSERT INTO `jun_area` VALUES ('4473', '342', '叙永县', '510524', '3');
INSERT INTO `jun_area` VALUES ('4474', '342', '古蔺县', '510525', '3');
INSERT INTO `jun_area` VALUES ('4475', '327', '旌阳区', '510603', '3');
INSERT INTO `jun_area` VALUES ('4476', '327', '中江县', '510623', '3');
INSERT INTO `jun_area` VALUES ('4477', '327', '罗江县', '510626', '3');
INSERT INTO `jun_area` VALUES ('4478', '327', '广汉市', '510681', '3');
INSERT INTO `jun_area` VALUES ('4479', '327', '什邡市', '510682', '3');
INSERT INTO `jun_area` VALUES ('4480', '327', '绵竹市', '510683', '3');
INSERT INTO `jun_area` VALUES ('4481', '323', '涪城区', '510703', '3');
INSERT INTO `jun_area` VALUES ('4482', '323', '游仙区', '510704', '3');
INSERT INTO `jun_area` VALUES ('4483', '323', '三台县', '510722', '3');
INSERT INTO `jun_area` VALUES ('4484', '323', '盐亭县', '510723', '3');
INSERT INTO `jun_area` VALUES ('4485', '323', '安县', '510724', '3');
INSERT INTO `jun_area` VALUES ('4486', '323', '梓潼县', '510725', '3');
INSERT INTO `jun_area` VALUES ('4487', '323', '北川羌族自治县', '510726', '3');
INSERT INTO `jun_area` VALUES ('4488', '323', '平武县', '510727', '3');
INSERT INTO `jun_area` VALUES ('4489', '323', '江油市', '510781', '3');
INSERT INTO `jun_area` VALUES ('4492', '330', '朝天区', '510812', '3');
INSERT INTO `jun_area` VALUES ('4493', '330', '旺苍县', '510821', '3');
INSERT INTO `jun_area` VALUES ('4494', '330', '青川县', '510822', '3');
INSERT INTO `jun_area` VALUES ('4495', '330', '剑阁县', '510823', '3');
INSERT INTO `jun_area` VALUES ('4496', '330', '苍溪县', '510824', '3');
INSERT INTO `jun_area` VALUES ('4497', '337', '船山区', '510903', '3');
INSERT INTO `jun_area` VALUES ('4498', '337', '安居区', '510904', '3');
INSERT INTO `jun_area` VALUES ('4499', '337', '蓬溪县', '510921', '3');
INSERT INTO `jun_area` VALUES ('4500', '337', '射洪县', '510922', '3');
INSERT INTO `jun_area` VALUES ('4501', '337', '大英县', '510923', '3');
INSERT INTO `jun_area` VALUES ('4502', '335', '市中区', '511002', '3');
INSERT INTO `jun_area` VALUES ('4503', '335', '东兴区', '511011', '3');
INSERT INTO `jun_area` VALUES ('4504', '335', '威远县', '511024', '3');
INSERT INTO `jun_area` VALUES ('4505', '335', '资中县', '511025', '3');
INSERT INTO `jun_area` VALUES ('4506', '335', '隆昌县', '511028', '3');
INSERT INTO `jun_area` VALUES ('4507', '331', '市中区', '511102', '3');
INSERT INTO `jun_area` VALUES ('4508', '331', '沙湾区', '511111', '3');
INSERT INTO `jun_area` VALUES ('4509', '331', '五通桥区', '511112', '3');
INSERT INTO `jun_area` VALUES ('4510', '331', '金口河区', '511113', '3');
INSERT INTO `jun_area` VALUES ('4511', '331', '犍为县', '511123', '3');
INSERT INTO `jun_area` VALUES ('4512', '331', '井研县', '511124', '3');
INSERT INTO `jun_area` VALUES ('4513', '331', '夹江县', '511126', '3');
INSERT INTO `jun_area` VALUES ('4514', '331', '沐川县', '511129', '3');
INSERT INTO `jun_area` VALUES ('4515', '331', '峨边彝族自治县', '511132', '3');
INSERT INTO `jun_area` VALUES ('4516', '331', '马边彝族自治县', '511133', '3');
INSERT INTO `jun_area` VALUES ('4517', '331', '峨眉山市', '511181', '3');
INSERT INTO `jun_area` VALUES ('4518', '334', '顺庆区', '511302', '3');
INSERT INTO `jun_area` VALUES ('4519', '334', '高坪区', '511303', '3');
INSERT INTO `jun_area` VALUES ('4520', '334', '嘉陵区', '511304', '3');
INSERT INTO `jun_area` VALUES ('4521', '334', '南部县', '511321', '3');
INSERT INTO `jun_area` VALUES ('4522', '334', '营山县', '511322', '3');
INSERT INTO `jun_area` VALUES ('4523', '334', '蓬安县', '511323', '3');
INSERT INTO `jun_area` VALUES ('4524', '334', '仪陇县', '511324', '3');
INSERT INTO `jun_area` VALUES ('4525', '334', '西充县', '511325', '3');
INSERT INTO `jun_area` VALUES ('4526', '334', '阆中市', '511381', '3');
INSERT INTO `jun_area` VALUES ('4527', '333', '东坡区', '511402', '3');
INSERT INTO `jun_area` VALUES ('4528', '333', '仁寿县', '511421', '3');
INSERT INTO `jun_area` VALUES ('4529', '333', '彭山区', '511403', '3');
INSERT INTO `jun_area` VALUES ('4530', '333', '洪雅县', '511423', '3');
INSERT INTO `jun_area` VALUES ('4531', '333', '丹棱县', '511424', '3');
INSERT INTO `jun_area` VALUES ('4532', '333', '青神县', '511425', '3');
INSERT INTO `jun_area` VALUES ('4533', '339', '翠屏区', '511502', '3');
INSERT INTO `jun_area` VALUES ('4534', '339', '宜宾县', '511521', '3');
INSERT INTO `jun_area` VALUES ('4535', '339', '南溪县', '511503', '3');
INSERT INTO `jun_area` VALUES ('4536', '339', '江安县', '511523', '3');
INSERT INTO `jun_area` VALUES ('4537', '339', '长宁县', '511524', '3');
INSERT INTO `jun_area` VALUES ('4538', '339', '高县', '511525', '3');
INSERT INTO `jun_area` VALUES ('4539', '339', '珙县', '511526', '3');
INSERT INTO `jun_area` VALUES ('4540', '339', '筠连县', '511527', '3');
INSERT INTO `jun_area` VALUES ('4541', '339', '兴文县', '511528', '3');
INSERT INTO `jun_area` VALUES ('4542', '339', '屏山县', '511529', '3');
INSERT INTO `jun_area` VALUES ('4543', '329', '广安区', '511602', '3');
INSERT INTO `jun_area` VALUES ('4544', '329', '岳池县', '511621', '3');
INSERT INTO `jun_area` VALUES ('4545', '329', '武胜县', '511622', '3');
INSERT INTO `jun_area` VALUES ('4546', '329', '邻水县', '511623', '3');
INSERT INTO `jun_area` VALUES ('4547', '329', '华蓥市', '511681', '3');
INSERT INTO `jun_area` VALUES ('4548', '326', '通川区', '511702', '3');
INSERT INTO `jun_area` VALUES ('4550', '326', '宣汉县', '511722', '3');
INSERT INTO `jun_area` VALUES ('4551', '326', '开江县', '511723', '3');
INSERT INTO `jun_area` VALUES ('4552', '326', '大竹县', '511724', '3');
INSERT INTO `jun_area` VALUES ('4553', '326', '渠县', '511725', '3');
INSERT INTO `jun_area` VALUES ('4554', '326', '万源市', '511781', '3');
INSERT INTO `jun_area` VALUES ('4555', '338', '雨城区', '511802', '3');
INSERT INTO `jun_area` VALUES ('4556', '338', '名山区', '511803', '3');
INSERT INTO `jun_area` VALUES ('4557', '338', '荥经县', '511822', '3');
INSERT INTO `jun_area` VALUES ('4558', '338', '汉源县', '511823', '3');
INSERT INTO `jun_area` VALUES ('4559', '338', '石棉县', '511824', '3');
INSERT INTO `jun_area` VALUES ('4560', '338', '天全县', '511825', '3');
INSERT INTO `jun_area` VALUES ('4561', '338', '芦山县', '511826', '3');
INSERT INTO `jun_area` VALUES ('4562', '338', '宝兴县', '511827', '3');
INSERT INTO `jun_area` VALUES ('4563', '325', '巴州区', '511902', '3');
INSERT INTO `jun_area` VALUES ('4564', '325', '通江县', '511921', '3');
INSERT INTO `jun_area` VALUES ('4565', '325', '南江县', '511922', '3');
INSERT INTO `jun_area` VALUES ('4566', '325', '平昌县', '511923', '3');
INSERT INTO `jun_area` VALUES ('4567', '340', '雁江区', '512002', '3');
INSERT INTO `jun_area` VALUES ('4568', '340', '安岳县', '512021', '3');
INSERT INTO `jun_area` VALUES ('4569', '340', '乐至县', '512022', '3');
INSERT INTO `jun_area` VALUES ('4570', '340', '简阳市', '512081', '3');
INSERT INTO `jun_area` VALUES ('4571', '111', '南明区', '520102', '3');
INSERT INTO `jun_area` VALUES ('4572', '111', '云岩区', '520103', '3');
INSERT INTO `jun_area` VALUES ('4573', '111', '花溪区', '520111', '3');
INSERT INTO `jun_area` VALUES ('4574', '111', '乌当区', '520112', '3');
INSERT INTO `jun_area` VALUES ('4575', '111', '白云区', '520113', '3');
INSERT INTO `jun_area` VALUES ('4576', '111', '小河区', '520100', '3');
INSERT INTO `jun_area` VALUES ('4577', '111', '开阳县', '520121', '3');
INSERT INTO `jun_area` VALUES ('4578', '111', '息烽县', '520122', '3');
INSERT INTO `jun_area` VALUES ('4579', '111', '修文县', '520123', '3');
INSERT INTO `jun_area` VALUES ('4580', '111', '清镇市', '520181', '3');
INSERT INTO `jun_area` VALUES ('4581', '114', '钟山区', '520201', '3');
INSERT INTO `jun_area` VALUES ('4582', '114', '六枝特区', '520203', '3');
INSERT INTO `jun_area` VALUES ('4583', '114', '水城县', '520221', '3');
INSERT INTO `jun_area` VALUES ('4584', '114', '盘县', '520222', '3');
INSERT INTO `jun_area` VALUES ('4585', '119', '红花岗区', '520302', '3');
INSERT INTO `jun_area` VALUES ('4586', '119', '汇川区', '520303', '3');
INSERT INTO `jun_area` VALUES ('4587', '119', '遵义县', '520321', '3');
INSERT INTO `jun_area` VALUES ('4588', '119', '桐梓县', '520322', '3');
INSERT INTO `jun_area` VALUES ('4589', '119', '绥阳县', '520323', '3');
INSERT INTO `jun_area` VALUES ('4590', '119', '正安县', '520324', '3');
INSERT INTO `jun_area` VALUES ('4591', '119', '道真仡佬族苗族自治县', '520325', '3');
INSERT INTO `jun_area` VALUES ('4592', '119', '务川仡佬族苗族自治县', '520326', '3');
INSERT INTO `jun_area` VALUES ('4593', '119', '凤冈县', '520327', '3');
INSERT INTO `jun_area` VALUES ('4594', '119', '湄潭县', '520328', '3');
INSERT INTO `jun_area` VALUES ('4595', '119', '余庆县', '520329', '3');
INSERT INTO `jun_area` VALUES ('4596', '119', '习水县', '520330', '3');
INSERT INTO `jun_area` VALUES ('4597', '119', '赤水市', '520381', '3');
INSERT INTO `jun_area` VALUES ('4598', '119', '仁怀市', '520382', '3');
INSERT INTO `jun_area` VALUES ('4599', '112', '西秀区', '520402', '3');
INSERT INTO `jun_area` VALUES ('4600', '112', '平坝区', '520403', '3');
INSERT INTO `jun_area` VALUES ('4601', '112', '普定县', '520422', '3');
INSERT INTO `jun_area` VALUES ('4602', '112', '镇宁布依族苗族自治县', '520423', '3');
INSERT INTO `jun_area` VALUES ('4603', '112', '关岭布依族苗族自治县', '520424', '3');
INSERT INTO `jun_area` VALUES ('4604', '112', '紫云苗族布依族自治县', '520425', '3');
INSERT INTO `jun_area` VALUES ('4605', '367', '五华区', '530102', '3');
INSERT INTO `jun_area` VALUES ('4606', '367', '盘龙区', '530103', '3');
INSERT INTO `jun_area` VALUES ('4607', '367', '官渡区', '530111', '3');
INSERT INTO `jun_area` VALUES ('4608', '367', '西山区', '530112', '3');
INSERT INTO `jun_area` VALUES ('4609', '367', '东川区', '530113', '3');
INSERT INTO `jun_area` VALUES ('4610', '367', '呈贡县', '530114', '3');
INSERT INTO `jun_area` VALUES ('4611', '367', '晋宁县', '530122', '3');
INSERT INTO `jun_area` VALUES ('4612', '367', '富民县', '530124', '3');
INSERT INTO `jun_area` VALUES ('4613', '367', '宜良县', '530125', '3');
INSERT INTO `jun_area` VALUES ('4614', '367', '石林彝族自治县', '530126', '3');
INSERT INTO `jun_area` VALUES ('4615', '367', '嵩明县', '530127', '3');
INSERT INTO `jun_area` VALUES ('4616', '367', '禄劝彝族苗族自治县', '530128', '3');
INSERT INTO `jun_area` VALUES ('4617', '367', '寻甸回族彝族自治县', '530129', '3');
INSERT INTO `jun_area` VALUES ('4618', '367', '安宁市', '530181', '3');
INSERT INTO `jun_area` VALUES ('4619', '378', '麒麟区', '530302', '3');
INSERT INTO `jun_area` VALUES ('4620', '378', '马龙县', '5303021', '3');
INSERT INTO `jun_area` VALUES ('4621', '378', '陆良县', '530322', '3');
INSERT INTO `jun_area` VALUES ('4622', '378', '师宗县', '530323', '3');
INSERT INTO `jun_area` VALUES ('4623', '378', '罗平县', '530324', '3');
INSERT INTO `jun_area` VALUES ('4624', '378', '富源县', '530325', '3');
INSERT INTO `jun_area` VALUES ('4625', '378', '会泽县', '530326', '3');
INSERT INTO `jun_area` VALUES ('4626', '378', '沾益县', '530328', '3');
INSERT INTO `jun_area` VALUES ('4627', '378', '宣威市', '530381', '3');
INSERT INTO `jun_area` VALUES ('4628', '381', '红塔区', '530402', '3');
INSERT INTO `jun_area` VALUES ('4629', '381', '江川县', '530421', '3');
INSERT INTO `jun_area` VALUES ('4630', '381', '澄江县', '530422', '3');
INSERT INTO `jun_area` VALUES ('4631', '381', '通海县', '530423', '3');
INSERT INTO `jun_area` VALUES ('4632', '381', '华宁县', '530424', '3');
INSERT INTO `jun_area` VALUES ('4633', '381', '易门县', '530425', '3');
INSERT INTO `jun_area` VALUES ('4634', '381', '峨山彝族自治县', '530426', '3');
INSERT INTO `jun_area` VALUES ('4635', '381', '新平彝族傣族自治县', '530427', '3');
INSERT INTO `jun_area` VALUES ('4636', '381', '元江哈尼族彝族傣族自治县', '530428', '3');
INSERT INTO `jun_area` VALUES ('4637', '371', '隆阳区', '530502', '3');
INSERT INTO `jun_area` VALUES ('4638', '371', '施甸县', '530521', '3');
INSERT INTO `jun_area` VALUES ('4639', '371', '腾冲市', '530581', '3');
INSERT INTO `jun_area` VALUES ('4640', '371', '龙陵县', '530523', '3');
INSERT INTO `jun_area` VALUES ('4641', '371', '昌宁县', '530524', '3');
INSERT INTO `jun_area` VALUES ('4642', '382', '昭阳区', '530602', '3');
INSERT INTO `jun_area` VALUES ('4643', '382', '鲁甸县', '530621', '3');
INSERT INTO `jun_area` VALUES ('4644', '382', '巧家县', '530622', '3');
INSERT INTO `jun_area` VALUES ('4645', '382', '盐津县', '530623', '3');
INSERT INTO `jun_area` VALUES ('4646', '382', '大关县', '530624', '3');
INSERT INTO `jun_area` VALUES ('4647', '382', '永善县', '530625', '3');
INSERT INTO `jun_area` VALUES ('4648', '382', '绥江县', '530626', '3');
INSERT INTO `jun_area` VALUES ('4649', '382', '镇雄县', '530627', '3');
INSERT INTO `jun_area` VALUES ('4650', '382', '彝良县', '530628', '3');
INSERT INTO `jun_area` VALUES ('4651', '382', '威信县', '530629', '3');
INSERT INTO `jun_area` VALUES ('4652', '382', '水富县', '530630', '3');
INSERT INTO `jun_area` VALUES ('4653', '370', '古城区', '530702', '3');
INSERT INTO `jun_area` VALUES ('4654', '370', '玉龙纳西族自治县', '530721', '3');
INSERT INTO `jun_area` VALUES ('4655', '370', '永胜县', '530722', '3');
INSERT INTO `jun_area` VALUES ('4656', '370', '华坪县', '530723', '3');
INSERT INTO `jun_area` VALUES ('4657', '370', '宁蒗彝族自治县', '530724', '3');
INSERT INTO `jun_area` VALUES ('4658', '377', '临翔区', '530902', '3');
INSERT INTO `jun_area` VALUES ('4659', '377', '凤庆县', '530921', '3');
INSERT INTO `jun_area` VALUES ('4660', '377', '云县', '530922', '3');
INSERT INTO `jun_area` VALUES ('4661', '377', '永德县', '530923', '3');
INSERT INTO `jun_area` VALUES ('4662', '377', '镇康县', '530924', '3');
INSERT INTO `jun_area` VALUES ('4663', '377', '双江拉祜族佤族布朗族傣族自治县', '530925', '3');
INSERT INTO `jun_area` VALUES ('4664', '377', '耿马傣族佤族自治县', '530926', '3');
INSERT INTO `jun_area` VALUES ('4665', '377', '沧源佤族自治县', '530927', '3');
INSERT INTO `jun_area` VALUES ('4666', '344', '城关区', '540102', '3');
INSERT INTO `jun_area` VALUES ('4667', '344', '林周县', '540121', '3');
INSERT INTO `jun_area` VALUES ('4668', '344', '当雄县', '540122', '3');
INSERT INTO `jun_area` VALUES ('4669', '344', '尼木县', '540123', '3');
INSERT INTO `jun_area` VALUES ('4670', '344', '曲水县', '540124', '3');
INSERT INTO `jun_area` VALUES ('4671', '344', '堆龙德庆县', '540125', '3');
INSERT INTO `jun_area` VALUES ('4672', '344', '达孜县', '540126', '3');
INSERT INTO `jun_area` VALUES ('4673', '344', '墨竹工卡县', '540127', '3');
INSERT INTO `jun_area` VALUES ('4674', '311', '新城区', '610102', '3');
INSERT INTO `jun_area` VALUES ('4675', '311', '碑林区', '610103', '3');
INSERT INTO `jun_area` VALUES ('4676', '311', '莲湖区', '610104', '3');
INSERT INTO `jun_area` VALUES ('4677', '311', '灞桥区', '610111', '3');
INSERT INTO `jun_area` VALUES ('4678', '311', '未央区', '610112', '3');
INSERT INTO `jun_area` VALUES ('4679', '311', '雁塔区', '610113', '3');
INSERT INTO `jun_area` VALUES ('4680', '311', '阎良区', '610114', '3');
INSERT INTO `jun_area` VALUES ('4681', '311', '临潼区', '610115', '3');
INSERT INTO `jun_area` VALUES ('4682', '311', '长安区', '610116', '3');
INSERT INTO `jun_area` VALUES ('4683', '311', '蓝田县', '610122', '3');
INSERT INTO `jun_area` VALUES ('4684', '311', '周至县', '610124', '3');
INSERT INTO `jun_area` VALUES ('4685', '311', '户县', '610125', '3');
INSERT INTO `jun_area` VALUES ('4686', '311', '高陵区', '610117', '3');
INSERT INTO `jun_area` VALUES ('4687', '316', '王益区', '610202', '3');
INSERT INTO `jun_area` VALUES ('4688', '316', '印台区', '610203', '3');
INSERT INTO `jun_area` VALUES ('4689', '316', '耀州区', '610204', '3');
INSERT INTO `jun_area` VALUES ('4690', '316', '宜君县', '610222', '3');
INSERT INTO `jun_area` VALUES ('4691', '313', '渭滨区', '610302', '3');
INSERT INTO `jun_area` VALUES ('4692', '313', '金台区', '610303', '3');
INSERT INTO `jun_area` VALUES ('4693', '313', '陈仓区', '610304', '3');
INSERT INTO `jun_area` VALUES ('4694', '313', '凤翔县', '610322', '3');
INSERT INTO `jun_area` VALUES ('4695', '313', '岐山县', '610323', '3');
INSERT INTO `jun_area` VALUES ('4696', '313', '扶风县', '610324', '3');
INSERT INTO `jun_area` VALUES ('4697', '313', '眉县', '610326', '3');
INSERT INTO `jun_area` VALUES ('4698', '313', '陇县', '610327', '3');
INSERT INTO `jun_area` VALUES ('4699', '313', '千阳县', '610328', '3');
INSERT INTO `jun_area` VALUES ('4700', '313', '麟游县', '610329', '3');
INSERT INTO `jun_area` VALUES ('4701', '313', '凤县', '610330', '3');
INSERT INTO `jun_area` VALUES ('4702', '313', '太白县', '610331', '3');
INSERT INTO `jun_area` VALUES ('4703', '318', '秦都区', '610402', '3');
INSERT INTO `jun_area` VALUES ('4704', '318', '杨凌区', '610403', '3');
INSERT INTO `jun_area` VALUES ('4705', '318', '渭城区', '610404', '3');
INSERT INTO `jun_area` VALUES ('4706', '318', '三原县', '610422', '3');
INSERT INTO `jun_area` VALUES ('4707', '318', '泾阳县', '610423', '3');
INSERT INTO `jun_area` VALUES ('4708', '318', '乾县', '610424', '3');
INSERT INTO `jun_area` VALUES ('4709', '318', '礼泉县', '610425', '3');
INSERT INTO `jun_area` VALUES ('4710', '318', '永寿县', '610426', '3');
INSERT INTO `jun_area` VALUES ('4711', '318', '彬县', '610427', '3');
INSERT INTO `jun_area` VALUES ('4712', '318', '长武县', '610428', '3');
INSERT INTO `jun_area` VALUES ('4713', '318', '旬邑县', '610429', '3');
INSERT INTO `jun_area` VALUES ('4714', '318', '淳化县', '610430', '3');
INSERT INTO `jun_area` VALUES ('4715', '318', '武功县', '610431', '3');
INSERT INTO `jun_area` VALUES ('4716', '318', '兴平市', '610481', '3');
INSERT INTO `jun_area` VALUES ('4717', '317', '临渭区', '610502', '3');
INSERT INTO `jun_area` VALUES ('4718', '317', '华县', '610521', '3');
INSERT INTO `jun_area` VALUES ('4719', '317', '潼关县', '610522', '3');
INSERT INTO `jun_area` VALUES ('4720', '317', '大荔县', '610523', '3');
INSERT INTO `jun_area` VALUES ('4721', '317', '合阳县', '610524', '3');
INSERT INTO `jun_area` VALUES ('4722', '317', '澄城县', '610525', '3');
INSERT INTO `jun_area` VALUES ('4723', '317', '蒲城县', '610526', '3');
INSERT INTO `jun_area` VALUES ('4724', '317', '白水县', '610527', '3');
INSERT INTO `jun_area` VALUES ('4725', '317', '富平县', '610528', '3');
INSERT INTO `jun_area` VALUES ('4726', '317', '韩城市', '610581', '3');
INSERT INTO `jun_area` VALUES ('4727', '317', '华阴市', '610582', '3');
INSERT INTO `jun_area` VALUES ('4728', '319', '宝塔区', '610602', '3');
INSERT INTO `jun_area` VALUES ('4729', '319', '延长县', '610621', '3');
INSERT INTO `jun_area` VALUES ('4730', '319', '延川县', '610622', '3');
INSERT INTO `jun_area` VALUES ('4731', '319', '子长县', '610623', '3');
INSERT INTO `jun_area` VALUES ('4732', '319', '安塞县', '610624', '3');
INSERT INTO `jun_area` VALUES ('4733', '319', '志丹县', '610625', '3');
INSERT INTO `jun_area` VALUES ('4734', '319', '吴起县', '610626', '3');
INSERT INTO `jun_area` VALUES ('4735', '319', '甘泉县', '610627', '3');
INSERT INTO `jun_area` VALUES ('4736', '319', '富县', '610628', '3');
INSERT INTO `jun_area` VALUES ('4737', '319', '洛川县', '610629', '3');
INSERT INTO `jun_area` VALUES ('4738', '319', '宜川县', '610630', '3');
INSERT INTO `jun_area` VALUES ('4739', '319', '黄龙县', '610631', '3');
INSERT INTO `jun_area` VALUES ('4740', '319', '黄陵县', '610632', '3');
INSERT INTO `jun_area` VALUES ('4741', '314', '汉台区', '610702', '3');
INSERT INTO `jun_area` VALUES ('4742', '314', '南郑县', '610721', '3');
INSERT INTO `jun_area` VALUES ('4743', '314', '城固县', '610722', '3');
INSERT INTO `jun_area` VALUES ('4744', '314', '洋县', '610723', '3');
INSERT INTO `jun_area` VALUES ('4745', '314', '西乡县', '610724', '3');
INSERT INTO `jun_area` VALUES ('4746', '314', '勉县', '610725', '3');
INSERT INTO `jun_area` VALUES ('4747', '314', '宁强县', '610726', '3');
INSERT INTO `jun_area` VALUES ('4748', '314', '略阳县', '610727', '3');
INSERT INTO `jun_area` VALUES ('4749', '314', '镇巴县', '610728', '3');
INSERT INTO `jun_area` VALUES ('4750', '314', '留坝县', '610729', '3');
INSERT INTO `jun_area` VALUES ('4751', '314', '佛坪县', '610730', '3');
INSERT INTO `jun_area` VALUES ('4752', '320', '榆阳区', '610802', '3');
INSERT INTO `jun_area` VALUES ('4753', '320', '神木县', '610821', '3');
INSERT INTO `jun_area` VALUES ('4754', '320', '府谷县', '610822', '3');
INSERT INTO `jun_area` VALUES ('4755', '320', '横山县', '610823', '3');
INSERT INTO `jun_area` VALUES ('4756', '320', '靖边县', '610824', '3');
INSERT INTO `jun_area` VALUES ('4757', '320', '定边县', '610825', '3');
INSERT INTO `jun_area` VALUES ('4758', '320', '绥德县', '610826', '3');
INSERT INTO `jun_area` VALUES ('4759', '320', '米脂县', '610827', '3');
INSERT INTO `jun_area` VALUES ('4760', '320', '佳县', '610828', '3');
INSERT INTO `jun_area` VALUES ('4761', '320', '吴堡县', '610829', '3');
INSERT INTO `jun_area` VALUES ('4762', '320', '清涧县', '610830', '3');
INSERT INTO `jun_area` VALUES ('4763', '320', '子洲县', '610831', '3');
INSERT INTO `jun_area` VALUES ('4764', '312', '汉滨区', '610902', '3');
INSERT INTO `jun_area` VALUES ('4765', '312', '汉阴县', '610921', '3');
INSERT INTO `jun_area` VALUES ('4766', '312', '石泉县', '610922', '3');
INSERT INTO `jun_area` VALUES ('4767', '312', '宁陕县', '610923', '3');
INSERT INTO `jun_area` VALUES ('4768', '312', '紫阳县', '610924', '3');
INSERT INTO `jun_area` VALUES ('4769', '312', '岚皋县', '610925', '3');
INSERT INTO `jun_area` VALUES ('4770', '312', '平利县', '610926', '3');
INSERT INTO `jun_area` VALUES ('4771', '312', '镇坪县', '610927', '3');
INSERT INTO `jun_area` VALUES ('4772', '312', '旬阳县', '610928', '3');
INSERT INTO `jun_area` VALUES ('4773', '312', '白河县', '610929', '3');
INSERT INTO `jun_area` VALUES ('4774', '315', '商州区', '611002', '3');
INSERT INTO `jun_area` VALUES ('4775', '315', '洛南县', '611021', '3');
INSERT INTO `jun_area` VALUES ('4776', '315', '丹凤县', '611022', '3');
INSERT INTO `jun_area` VALUES ('4777', '315', '商南县', '611023', '3');
INSERT INTO `jun_area` VALUES ('4778', '315', '山阳县', '611024', '3');
INSERT INTO `jun_area` VALUES ('4779', '315', '镇安县', '611025', '3');
INSERT INTO `jun_area` VALUES ('4780', '315', '柞水县', '611026', '3');
INSERT INTO `jun_area` VALUES ('4781', '62', '城关区', '620102', '3');
INSERT INTO `jun_area` VALUES ('4782', '62', '七里河区', '620103', '3');
INSERT INTO `jun_area` VALUES ('4783', '62', '西固区', '620104', '3');
INSERT INTO `jun_area` VALUES ('4784', '62', '安宁区', '620105', '3');
INSERT INTO `jun_area` VALUES ('4785', '62', '红古区', '620111', '3');
INSERT INTO `jun_area` VALUES ('4786', '62', '永登县', '620121', '3');
INSERT INTO `jun_area` VALUES ('4787', '62', '皋兰县', '620122', '3');
INSERT INTO `jun_area` VALUES ('4788', '62', '榆中县', '620123', '3');
INSERT INTO `jun_area` VALUES ('4789', '67', '金川区', '620302', '3');
INSERT INTO `jun_area` VALUES ('4790', '67', '永昌县', '620321', '3');
INSERT INTO `jun_area` VALUES ('4791', '63', '白银区', '620402', '3');
INSERT INTO `jun_area` VALUES ('4792', '63', '平川区', '620403', '3');
INSERT INTO `jun_area` VALUES ('4793', '63', '靖远县', '620421', '3');
INSERT INTO `jun_area` VALUES ('4794', '63', '会宁县', '620422', '3');
INSERT INTO `jun_area` VALUES ('4795', '63', '景泰县', '620423', '3');
INSERT INTO `jun_area` VALUES ('4796', '73', '秦城区', '520502', '3');
INSERT INTO `jun_area` VALUES ('4797', '73', '北道区', '620503', '3');
INSERT INTO `jun_area` VALUES ('4798', '73', '清水县', '620521', '3');
INSERT INTO `jun_area` VALUES ('4799', '73', '秦安县', '620522', '3');
INSERT INTO `jun_area` VALUES ('4800', '73', '甘谷县', '620523', '3');
INSERT INTO `jun_area` VALUES ('4801', '73', '武山县', '620524', '3');
INSERT INTO `jun_area` VALUES ('4802', '73', '张家川回族自治县', '620525', '3');
INSERT INTO `jun_area` VALUES ('4803', '74', '凉州区', '620602', '3');
INSERT INTO `jun_area` VALUES ('4804', '74', '民勤县', '620621', '3');
INSERT INTO `jun_area` VALUES ('4805', '74', '古浪县', '620622', '3');
INSERT INTO `jun_area` VALUES ('4806', '74', '天祝藏族自治县', '620623', '3');
INSERT INTO `jun_area` VALUES ('4807', '75', '甘州区', '620702', '3');
INSERT INTO `jun_area` VALUES ('4808', '75', '肃南裕固族自治县', '620721', '3');
INSERT INTO `jun_area` VALUES ('4809', '75', '民乐县', '620722', '3');
INSERT INTO `jun_area` VALUES ('4810', '75', '临泽县', '620723', '3');
INSERT INTO `jun_area` VALUES ('4811', '75', '高台县', '620724', '3');
INSERT INTO `jun_area` VALUES ('4812', '75', '山丹县', '620725', '3');
INSERT INTO `jun_area` VALUES ('4813', '71', '崆峒区', '620802', '3');
INSERT INTO `jun_area` VALUES ('4814', '71', '泾川县', '620821', '3');
INSERT INTO `jun_area` VALUES ('4815', '71', '灵台县', '620822', '3');
INSERT INTO `jun_area` VALUES ('4816', '71', '崇信县', '620823', '3');
INSERT INTO `jun_area` VALUES ('4817', '71', '华亭县', '620824', '3');
INSERT INTO `jun_area` VALUES ('4818', '71', '庄浪县', '620825', '3');
INSERT INTO `jun_area` VALUES ('4819', '71', '静宁县', '620826', '3');
INSERT INTO `jun_area` VALUES ('4820', '68', '肃州区', '620902', '3');
INSERT INTO `jun_area` VALUES ('4821', '68', '金塔县', '620921', '3');
INSERT INTO `jun_area` VALUES ('4822', '68', '瓜州县', '620922', '3');
INSERT INTO `jun_area` VALUES ('4823', '68', '肃北蒙古族自治县', '620923', '3');
INSERT INTO `jun_area` VALUES ('4824', '68', '阿克塞哈萨克族自治县', '620924', '3');
INSERT INTO `jun_area` VALUES ('4825', '68', '玉门市', '620981', '3');
INSERT INTO `jun_area` VALUES ('4826', '68', '敦煌市', '620982', '3');
INSERT INTO `jun_area` VALUES ('4827', '72', '西峰区', '621002', '3');
INSERT INTO `jun_area` VALUES ('4828', '72', '庆城县', '621021', '3');
INSERT INTO `jun_area` VALUES ('4829', '72', '环县', '621022', '3');
INSERT INTO `jun_area` VALUES ('4830', '72', '华池县', '621023', '3');
INSERT INTO `jun_area` VALUES ('4831', '72', '合水县', '621024', '3');
INSERT INTO `jun_area` VALUES ('4832', '72', '正宁县', '621025', '3');
INSERT INTO `jun_area` VALUES ('4833', '72', '宁县', '621026', '3');
INSERT INTO `jun_area` VALUES ('4834', '72', '镇原县', '621027', '3');
INSERT INTO `jun_area` VALUES ('4835', '64', '安定区', '621102', '3');
INSERT INTO `jun_area` VALUES ('4836', '64', '通渭县', '621121', '3');
INSERT INTO `jun_area` VALUES ('4837', '64', '陇西县', '621122', '3');
INSERT INTO `jun_area` VALUES ('4838', '64', '渭源县', '621123', '3');
INSERT INTO `jun_area` VALUES ('4839', '64', '临洮县', '621124', '3');
INSERT INTO `jun_area` VALUES ('4840', '64', '漳县', '621125', '3');
INSERT INTO `jun_area` VALUES ('4841', '64', '岷县', '621126', '3');
INSERT INTO `jun_area` VALUES ('4842', '70', '武都区', '621202', '3');
INSERT INTO `jun_area` VALUES ('4843', '70', '成县', '621221', '3');
INSERT INTO `jun_area` VALUES ('4844', '70', '文县', '621222', '3');
INSERT INTO `jun_area` VALUES ('4845', '70', '宕昌县', '621223', '3');
INSERT INTO `jun_area` VALUES ('4846', '70', '康县', '621224', '3');
INSERT INTO `jun_area` VALUES ('4847', '70', '西和县', '621225', '3');
INSERT INTO `jun_area` VALUES ('4848', '70', '礼县', '621226', '3');
INSERT INTO `jun_area` VALUES ('4849', '70', '徽县', '621227', '3');
INSERT INTO `jun_area` VALUES ('4850', '70', '两当县', '621228', '3');
INSERT INTO `jun_area` VALUES ('4851', '275', '城东区', '630102', '3');
INSERT INTO `jun_area` VALUES ('4852', '275', '城中区', '630103', '3');
INSERT INTO `jun_area` VALUES ('4853', '275', '城西区', '630104', '3');
INSERT INTO `jun_area` VALUES ('4854', '275', '城北区', '630105', '3');
INSERT INTO `jun_area` VALUES ('4855', '275', '大通回族土族自治县', '630121', '3');
INSERT INTO `jun_area` VALUES ('4856', '275', '湟中县', '630122', '3');
INSERT INTO `jun_area` VALUES ('4857', '275', '湟源县', '630123', '3');
INSERT INTO `jun_area` VALUES ('4858', '270', '兴庆区', '640104', '3');
INSERT INTO `jun_area` VALUES ('4859', '270', '西夏区', '640105', '3');
INSERT INTO `jun_area` VALUES ('4860', '270', '金凤区', '640106', '3');
INSERT INTO `jun_area` VALUES ('4861', '270', '永宁县', '640121', '3');
INSERT INTO `jun_area` VALUES ('4862', '270', '贺兰县', '640122', '3');
INSERT INTO `jun_area` VALUES ('4863', '270', '灵武市', '640181', '3');
INSERT INTO `jun_area` VALUES ('4864', '272', '大武口区', '640202', '3');
INSERT INTO `jun_area` VALUES ('4865', '272', '惠农区', '640205', '3');
INSERT INTO `jun_area` VALUES ('4866', '272', '平罗县', '640221', '3');
INSERT INTO `jun_area` VALUES ('4867', '273', '利通区', '640302', '3');
INSERT INTO `jun_area` VALUES ('4868', '273', '盐池县', '640323', '3');
INSERT INTO `jun_area` VALUES ('4869', '273', '同心县', '640324', '3');
INSERT INTO `jun_area` VALUES ('4870', '273', '青铜峡市', '640381', '3');
INSERT INTO `jun_area` VALUES ('4871', '271', '原州区', '640402', '3');
INSERT INTO `jun_area` VALUES ('4872', '271', '西吉县', '640422', '3');
INSERT INTO `jun_area` VALUES ('4873', '271', '隆德县', '640423', '3');
INSERT INTO `jun_area` VALUES ('4874', '271', '泾源县', '640424', '3');
INSERT INTO `jun_area` VALUES ('4875', '271', '彭阳县', '640425', '3');
INSERT INTO `jun_area` VALUES ('4876', '274', '沙坡头区', '640502', '3');
INSERT INTO `jun_area` VALUES ('4877', '274', '中宁县', '640521', '3');
INSERT INTO `jun_area` VALUES ('4878', '274', '海原县', '640522', '3');
INSERT INTO `jun_area` VALUES ('4879', '351', '天山区', '650102', '3');
INSERT INTO `jun_area` VALUES ('4880', '351', '沙依巴克区', '650103', '3');
INSERT INTO `jun_area` VALUES ('4881', '351', '新市区', '650104', '3');
INSERT INTO `jun_area` VALUES ('4882', '351', '水磨沟区', '650105', '3');
INSERT INTO `jun_area` VALUES ('4883', '351', '头屯河区', '650106', '3');
INSERT INTO `jun_area` VALUES ('4884', '351', '达坂城区', '650107', '3');
INSERT INTO `jun_area` VALUES ('4885', '351', '东山区', '650109', '3');
INSERT INTO `jun_area` VALUES ('4886', '351', '乌鲁木齐县', '650121', '3');
INSERT INTO `jun_area` VALUES ('4887', '360', '独山子区', '650202', '3');
INSERT INTO `jun_area` VALUES ('4888', '360', '克拉玛依区', '650203', '3');
INSERT INTO `jun_area` VALUES ('4889', '360', '白碱滩区', '650204', '3');
INSERT INTO `jun_area` VALUES ('4890', '360', '乌尔禾区', '650205', '3');
INSERT INTO `jun_area` VALUES ('4893', '121', '天涯区', '460204', '3');
INSERT INTO `jun_area` VALUES ('4894', '121', '吉阳区', '460203', '3');
INSERT INTO `jun_area` VALUES ('4895', '121', '崖州区', '406205', '3');
INSERT INTO `jun_area` VALUES ('4896', '121', '海棠区', '460202', '3');
INSERT INTO `jun_area` VALUES ('4900', '139', '莲池区', '130606', '3');
INSERT INTO `jun_area` VALUES ('4901', '79', '莞城街道', '441902', '3');
INSERT INTO `jun_area` VALUES ('4902', '79', '南城街道', '441903', '3');
INSERT INTO `jun_area` VALUES ('4903', '79', '东城街道', '441904', '3');
INSERT INTO `jun_area` VALUES ('4904', '79', '万江街道', '441905', '3');
INSERT INTO `jun_area` VALUES ('4905', '79', '石碣镇', '441930', '3');
INSERT INTO `jun_area` VALUES ('4906', '79', '石龙镇', '441906', '3');
INSERT INTO `jun_area` VALUES ('4907', '79', '茶山镇', '441908', '3');
INSERT INTO `jun_area` VALUES ('4908', '79', '石排镇', '441907', '3');
INSERT INTO `jun_area` VALUES ('4909', '79', '企石镇', '441909', '3');
INSERT INTO `jun_area` VALUES ('4910', '79', '横沥镇', '441912', '3');
INSERT INTO `jun_area` VALUES ('4911', '79', '桥头镇', '441910', '3');
INSERT INTO `jun_area` VALUES ('4912', '79', '谢岗镇', '441923', '3');
INSERT INTO `jun_area` VALUES ('4913', '79', '东坑镇', '441911', '3');
INSERT INTO `jun_area` VALUES ('4914', '79', '常平镇', '441913', '3');
INSERT INTO `jun_area` VALUES ('4915', '79', '寮步镇', '441918', '3');
INSERT INTO `jun_area` VALUES ('4916', '79', '大朗镇', '441920', '3');
INSERT INTO `jun_area` VALUES ('4917', '79', '黄江镇', '441921', '3');
INSERT INTO `jun_area` VALUES ('4918', '79', '清溪镇', '441925', '3');
INSERT INTO `jun_area` VALUES ('4919', '79', '塘厦镇', '441924', '3');
INSERT INTO `jun_area` VALUES ('4920', '79', '凤岗镇', '441926', '3');
INSERT INTO `jun_area` VALUES ('4921', '79', '长安镇', '441915', '3');
INSERT INTO `jun_area` VALUES ('4922', '79', '虎门镇', '441914', '3');
INSERT INTO `jun_area` VALUES ('4923', '79', '厚街镇', '441917', '3');
INSERT INTO `jun_area` VALUES ('4924', '79', '沙田镇', '441916', '3');
INSERT INTO `jun_area` VALUES ('4925', '79', '道滘镇', '441933', '3');
INSERT INTO `jun_area` VALUES ('4926', '79', '洪梅镇', '441932', '3');
INSERT INTO `jun_area` VALUES ('4927', '79', '麻涌镇', '441927', '3');
INSERT INTO `jun_area` VALUES ('4928', '79', '中堂镇', '441928', '3');
INSERT INTO `jun_area` VALUES ('4929', '79', '高埗镇', '441929', '3');
INSERT INTO `jun_area` VALUES ('4930', '79', '樟木头镇', '441922', '3');
INSERT INTO `jun_area` VALUES ('4931', '79', '大岭山镇', '441919', '3');
INSERT INTO `jun_area` VALUES ('4932', '79', '望牛墩镇', '441931', '3');
INSERT INTO `jun_area` VALUES ('4935', '196', '恩施市', '422801', '3');
INSERT INTO `jun_area` VALUES ('4936', '196', '利川市', '422802', '3');
INSERT INTO `jun_area` VALUES ('4937', '196', '巴东县', '422823', '3');
INSERT INTO `jun_area` VALUES ('4938', '196', '宣恩县', '422825', '3');
INSERT INTO `jun_area` VALUES ('4939', '196', '来凤县', '422827', '3');
INSERT INTO `jun_area` VALUES ('4940', '196', '鹤峰县', '422828', '3');
INSERT INTO `jun_area` VALUES ('4941', '181', '郑场', '01', '3');
INSERT INTO `jun_area` VALUES ('4942', '181', '毛嘴', '02', '3');
INSERT INTO `jun_area` VALUES ('4943', '181', '剅河', '03', '3');
INSERT INTO `jun_area` VALUES ('4944', '181', '三伏潭', '04', '3');
INSERT INTO `jun_area` VALUES ('4945', '181', '胡场', '05', '3');
INSERT INTO `jun_area` VALUES ('4946', '181', '长埫口', '06', '3');
INSERT INTO `jun_area` VALUES ('4947', '181', '西流河', '07', '3');
INSERT INTO `jun_area` VALUES ('4948', '181', '彭场', '08', '3');
INSERT INTO `jun_area` VALUES ('4949', '181', '沙湖', '09', '3');
INSERT INTO `jun_area` VALUES ('4950', '181', '杨林尾', '10', '3');
INSERT INTO `jun_area` VALUES ('4951', '181', '张沟', '11', '3');
INSERT INTO `jun_area` VALUES ('4952', '181', '郭河', '12', '3');
INSERT INTO `jun_area` VALUES ('4953', '181', '沔城', '13', '3');
INSERT INTO `jun_area` VALUES ('4954', '181', '通海口', '14', '3');
INSERT INTO `jun_area` VALUES ('4955', '181', '陈场', '15', '3');
INSERT INTO `jun_area` VALUES ('4956', '187', '竹根滩镇', '01', '3');
INSERT INTO `jun_area` VALUES ('4957', '187', '渔洋镇', '02', '3');
INSERT INTO `jun_area` VALUES ('4958', '187', '王场镇', '03', '3');
INSERT INTO `jun_area` VALUES ('4959', '187', '高石碑镇', '04', '3');
INSERT INTO `jun_area` VALUES ('4960', '187', '熊口镇', '05', '3');
INSERT INTO `jun_area` VALUES ('4961', '187', '老新镇', '06', '3');
INSERT INTO `jun_area` VALUES ('4962', '187', '浩口镇', '07', '3');
INSERT INTO `jun_area` VALUES ('4963', '187', '积玉口镇', '08', '3');
INSERT INTO `jun_area` VALUES ('4964', '187', '张金镇', '09', '3');
INSERT INTO `jun_area` VALUES ('4965', '187', '龙湾镇', '10', '3');
INSERT INTO `jun_area` VALUES ('4966', '188', '松柏镇', '01', '3');
INSERT INTO `jun_area` VALUES ('4967', '188', '阳日镇', '02', '3');
INSERT INTO `jun_area` VALUES ('4968', '188', '木鱼镇', '03', '3');
INSERT INTO `jun_area` VALUES ('4969', '188', '红坪镇', '04', '3');
INSERT INTO `jun_area` VALUES ('4970', '188', '新华镇', '05', '3');
INSERT INTO `jun_area` VALUES ('4971', '191', '竟陵', '01', '3');
INSERT INTO `jun_area` VALUES ('4972', '191', '杨林', '02', '3');
INSERT INTO `jun_area` VALUES ('4973', '191', '岳口', '03', '3');
INSERT INTO `jun_area` VALUES ('4974', '191', '侨乡', '04', '3');
INSERT INTO `jun_area` VALUES ('5171', '260', '五原县', '150821', '3');
INSERT INTO `jun_area` VALUES ('5170', '260', '临河区', '150802', '3');
INSERT INTO `jun_area` VALUES ('4979', '196', '建始县', '422822', '3');
INSERT INTO `jun_area` VALUES ('4980', '196', '咸丰县', '422826', '3');
INSERT INTO `jun_area` VALUES ('4982', '3414', '东城区', '110101', '3');
INSERT INTO `jun_area` VALUES ('4983', '3414', '西城区', '110102', '3');
INSERT INTO `jun_area` VALUES ('4984', '3414', '朝阳区', '110105', '3');
INSERT INTO `jun_area` VALUES ('4985', '3414', '海淀区', '110108', '3');
INSERT INTO `jun_area` VALUES ('4986', '3414', '丰台区', '110106', '3');
INSERT INTO `jun_area` VALUES ('4987', '3414', '石景山区', '110107', '3');
INSERT INTO `jun_area` VALUES ('4988', '3414', '门头沟区', '110109', '3');
INSERT INTO `jun_area` VALUES ('4989', '3414', '房山区', '110111', '3');
INSERT INTO `jun_area` VALUES ('4990', '3414', '大兴区', '110115', '3');
INSERT INTO `jun_area` VALUES ('4991', '3414', '通州区', '110112', '3');
INSERT INTO `jun_area` VALUES ('4992', '3414', '顺义区', '110113', '3');
INSERT INTO `jun_area` VALUES ('4993', '3414', '昌平区', '110114', '3');
INSERT INTO `jun_area` VALUES ('4994', '3414', '平谷区', '110117', '3');
INSERT INTO `jun_area` VALUES ('4995', '3414', '怀柔区', '110116', '3');
INSERT INTO `jun_area` VALUES ('4996', '3414', '密云县', '110228', '3');
INSERT INTO `jun_area` VALUES ('4997', '3414', '延庆县', '110229', '3');
INSERT INTO `jun_area` VALUES ('5000', '321', '黄浦区', '310101', '3');
INSERT INTO `jun_area` VALUES ('5002', '321', '徐汇区', '310104', '3');
INSERT INTO `jun_area` VALUES ('5003', '321', '长宁区', '310105', '3');
INSERT INTO `jun_area` VALUES ('5004', '321', '静安区', '310106', '3');
INSERT INTO `jun_area` VALUES ('5005', '321', '普陀区', '310107', '3');
INSERT INTO `jun_area` VALUES ('5006', '321', '闸北区', '310108', '3');
INSERT INTO `jun_area` VALUES ('5007', '321', '虹口区', '310109', '3');
INSERT INTO `jun_area` VALUES ('5008', '321', '杨浦区', '310110', '3');
INSERT INTO `jun_area` VALUES ('5009', '321', '宝山区', '310113', '3');
INSERT INTO `jun_area` VALUES ('5010', '321', '闵行区', '310112', '3');
INSERT INTO `jun_area` VALUES ('5011', '321', '嘉定区', '310114', '3');
INSERT INTO `jun_area` VALUES ('5012', '321', '松江区', '310117', '3');
INSERT INTO `jun_area` VALUES ('5013', '321', '金山区', '310116', '3');
INSERT INTO `jun_area` VALUES ('5014', '321', '青浦区', '310118', '3');
INSERT INTO `jun_area` VALUES ('5016', '321', '奉贤区', '310120', '3');
INSERT INTO `jun_area` VALUES ('5017', '321', '浦东新区', '310115', '3');
INSERT INTO `jun_area` VALUES ('5018', '321', '崇明县', '310230', '3');
INSERT INTO `jun_area` VALUES ('5019', '343', '和平区', '120101', '3');
INSERT INTO `jun_area` VALUES ('5020', '343', '河东区', '120102', '3');
INSERT INTO `jun_area` VALUES ('5021', '343', '河西区', '120103', '3');
INSERT INTO `jun_area` VALUES ('5022', '343', '南开区', '120104', '3');
INSERT INTO `jun_area` VALUES ('5023', '343', '河北区', '120105', '3');
INSERT INTO `jun_area` VALUES ('5024', '343', '红桥区', '120106', '3');
INSERT INTO `jun_area` VALUES ('5028', '343', '东丽区', '120110', '3');
INSERT INTO `jun_area` VALUES ('5029', '343', '西青区', '120111', '3');
INSERT INTO `jun_area` VALUES ('5030', '343', '北辰区', '120113', '3');
INSERT INTO `jun_area` VALUES ('5031', '343', '津南区', '120112', '3');
INSERT INTO `jun_area` VALUES ('5032', '343', '武清区', '120114', '3');
INSERT INTO `jun_area` VALUES ('5033', '343', '宝坻区', '120115', '3');
INSERT INTO `jun_area` VALUES ('5034', '343', '静海区', '120118', '3');
INSERT INTO `jun_area` VALUES ('5035', '343', '宁河区', '120117', '3');
INSERT INTO `jun_area` VALUES ('5036', '343', '蓟县', '120225', '3');
INSERT INTO `jun_area` VALUES ('5037', '394', '渝中区', '500103', '3');
INSERT INTO `jun_area` VALUES ('5038', '394', '大渡口区', '500104', '3');
INSERT INTO `jun_area` VALUES ('5039', '394', '江北区', '500105', '3');
INSERT INTO `jun_area` VALUES ('5040', '394', '南岸区', '500108', '3');
INSERT INTO `jun_area` VALUES ('5041', '394', '北碚区', '500109', '3');
INSERT INTO `jun_area` VALUES ('5042', '394', '渝北区', '500112', '3');
INSERT INTO `jun_area` VALUES ('5043', '394', '巴南区', '500113', '3');
INSERT INTO `jun_area` VALUES ('5044', '394', '长寿区', '500115', '3');
INSERT INTO `jun_area` VALUES ('5046', '394', '沙坪坝区', '500106', '3');
INSERT INTO `jun_area` VALUES ('5048', '394', '万州区', '500101', '3');
INSERT INTO `jun_area` VALUES ('5049', '394', '涪陵区', '500102', '3');
INSERT INTO `jun_area` VALUES ('5050', '394', '黔江区', '500114', '3');
INSERT INTO `jun_area` VALUES ('5051', '394', '永川区', '500118', '3');
INSERT INTO `jun_area` VALUES ('5052', '394', '合川区', '500117', '3');
INSERT INTO `jun_area` VALUES ('5053', '394', '江津区', '500116', '3');
INSERT INTO `jun_area` VALUES ('5054', '394', '九龙坡区', '500107', '3');
INSERT INTO `jun_area` VALUES ('5055', '394', '南川区', '500119', '3');
INSERT INTO `jun_area` VALUES ('5056', '394', '綦江区', '500110', '3');
INSERT INTO `jun_area` VALUES ('5057', '394', '潼南区', '500152', '3');
INSERT INTO `jun_area` VALUES ('5058', '394', '荣昌区', '500153', '3');
INSERT INTO `jun_area` VALUES ('5059', '394', '璧山区', '500120', '3');
INSERT INTO `jun_area` VALUES ('5060', '394', '大足区', '500111', '3');
INSERT INTO `jun_area` VALUES ('5061', '394', '铜梁区', '500151', '3');
INSERT INTO `jun_area` VALUES ('5062', '394', '梁平县', '500228', '3');
INSERT INTO `jun_area` VALUES ('5063', '394', '开县', '500234', '3');
INSERT INTO `jun_area` VALUES ('5064', '394', '忠县', '500233', '3');
INSERT INTO `jun_area` VALUES ('5065', '394', '城口县', '500229', '3');
INSERT INTO `jun_area` VALUES ('5066', '394', '垫江县', '500231', '3');
INSERT INTO `jun_area` VALUES ('5067', '394', '武隆县', '500232', '3');
INSERT INTO `jun_area` VALUES ('5068', '394', '丰都县', '500230', '3');
INSERT INTO `jun_area` VALUES ('5069', '394', '奉节县', '500236', '3');
INSERT INTO `jun_area` VALUES ('5070', '394', '云阳县', '500235', '3');
INSERT INTO `jun_area` VALUES ('5071', '394', '巫溪县', '500238', '3');
INSERT INTO `jun_area` VALUES ('5072', '394', '巫山县', '500237', '3');
INSERT INTO `jun_area` VALUES ('5073', '394', '石柱土家族自治县', '500240', '3');
INSERT INTO `jun_area` VALUES ('5074', '394', '秀山土家族苗族自治县', '500241', '3');
INSERT INTO `jun_area` VALUES ('5075', '394', '酉阳土家族苗族自治县', '500242', '3');
INSERT INTO `jun_area` VALUES ('5076', '394', '彭水苗族土家族自治县', '500243', '3');
INSERT INTO `jun_area` VALUES ('5077', '259', '阿拉善左旗', '152921', '3');
INSERT INTO `jun_area` VALUES ('5078', '259', '阿拉善右旗', '152922', '3');
INSERT INTO `jun_area` VALUES ('5079', '259', '额济纳旗', '152923', '3');
INSERT INTO `jun_area` VALUES ('5080', '95', '石岐街道', '442002', '3');
INSERT INTO `jun_area` VALUES ('5081', '95', '东区街道', '442003', '3');
INSERT INTO `jun_area` VALUES ('5082', '95', '西区街道', '442004', '3');
INSERT INTO `jun_area` VALUES ('5083', '95', '南区街道', '442005', '3');
INSERT INTO `jun_area` VALUES ('5084', '95', '五桂山街道', '442006', '3');
INSERT INTO `jun_area` VALUES ('5085', '95', '火炬开发区', '442007', '3');
INSERT INTO `jun_area` VALUES ('5086', '95', '黄圃镇', '442008', '3');
INSERT INTO `jun_area` VALUES ('5087', '95', '南头镇', '442009', '3');
INSERT INTO `jun_area` VALUES ('5088', '95', '东凤镇', '442010', '3');
INSERT INTO `jun_area` VALUES ('5089', '95', '阜沙镇', '442011', '3');
INSERT INTO `jun_area` VALUES ('5090', '95', '小榄镇', '442012', '3');
INSERT INTO `jun_area` VALUES ('5091', '95', '东升镇', '442013', '3');
INSERT INTO `jun_area` VALUES ('5092', '95', '古镇', '442014', '3');
INSERT INTO `jun_area` VALUES ('5093', '95', '横栏镇', '442015', '3');
INSERT INTO `jun_area` VALUES ('5094', '95', '三角镇', '442016', '3');
INSERT INTO `jun_area` VALUES ('5095', '95', '民众镇', '442017', '3');
INSERT INTO `jun_area` VALUES ('5096', '95', '南朗镇', '442018', '3');
INSERT INTO `jun_area` VALUES ('5097', '95', '港口镇', '442019', '3');
INSERT INTO `jun_area` VALUES ('5098', '95', '大涌镇', '442020', '3');
INSERT INTO `jun_area` VALUES ('5099', '95', '沙溪镇', '442021', '3');
INSERT INTO `jun_area` VALUES ('5100', '95', '三乡镇', '442022', '3');
INSERT INTO `jun_area` VALUES ('5101', '95', '板芙镇', '442023', '3');
INSERT INTO `jun_area` VALUES ('5102', '95', '神湾镇', '442024', '3');
INSERT INTO `jun_area` VALUES ('5103', '95', '坦洲镇', '442025', '3');
INSERT INTO `jun_area` VALUES ('5104', '3416', '西沙群岛', '460321', '3');
INSERT INTO `jun_area` VALUES ('5105', '3416', '中沙群岛', '460323', '3');
INSERT INTO `jun_area` VALUES ('5106', '3416', '南沙群岛', '460322', '3');
INSERT INTO `jun_area` VALUES ('5107', '137', '那大镇', '460402', '3');
INSERT INTO `jun_area` VALUES ('5108', '137', '和庆镇', '460403', '3');
INSERT INTO `jun_area` VALUES ('5109', '137', '南丰镇', '460404', '3');
INSERT INTO `jun_area` VALUES ('5110', '137', '大城镇', '460405', '3');
INSERT INTO `jun_area` VALUES ('5111', '137', '雅星镇', '460406', '3');
INSERT INTO `jun_area` VALUES ('5112', '137', '兰洋镇', '460407', '3');
INSERT INTO `jun_area` VALUES ('5113', '137', '光村镇', '460408', '3');
INSERT INTO `jun_area` VALUES ('5114', '137', '木棠镇', '460409', '3');
INSERT INTO `jun_area` VALUES ('5115', '137', '海头镇', '460410', '3');
INSERT INTO `jun_area` VALUES ('5116', '137', '峨蔓镇', '460411', '3');
INSERT INTO `jun_area` VALUES ('5117', '137', '王五镇', '460412', '3');
INSERT INTO `jun_area` VALUES ('5118', '137', '白马井镇', '460413', '3');
INSERT INTO `jun_area` VALUES ('5119', '137', '中和镇', '460414', '3');
INSERT INTO `jun_area` VALUES ('5120', '137', '排浦镇', '460415', '3');
INSERT INTO `jun_area` VALUES ('5121', '137', '东城镇', '460416', '3');
INSERT INTO `jun_area` VALUES ('5122', '137', '新州镇', '460417', '3');
INSERT INTO `jun_area` VALUES ('5123', '137', '八一总场', '460418', '3');
INSERT INTO `jun_area` VALUES ('5124', '137', '蓝洋农场', '460419', '3');
INSERT INTO `jun_area` VALUES ('5125', '137', '西联农场', '460420', '3');
INSERT INTO `jun_area` VALUES ('5126', '137', '西培农场', '460421', '3');
INSERT INTO `jun_area` VALUES ('5130', '3417', '定州市', '139001', '3');
INSERT INTO `jun_area` VALUES ('5131', '3417', '辛集市', '139002', '3');
INSERT INTO `jun_area` VALUES ('5132', '3418', '济源市', '419001', '3');
INSERT INTO `jun_area` VALUES ('5133', '3419', '仙桃市', '429004', '3');
INSERT INTO `jun_area` VALUES ('5134', '3419', '潜江市', '429005', '3');
INSERT INTO `jun_area` VALUES ('5135', '3419', '天门市', '429006', '3');
INSERT INTO `jun_area` VALUES ('5136', '3419', '神农架林区', '429021', '3');
INSERT INTO `jun_area` VALUES ('5137', '3420', '五指山市', '469001', '3');
INSERT INTO `jun_area` VALUES ('5138', '3420', '琼海市', '469002', '3');
INSERT INTO `jun_area` VALUES ('5139', '3420', '文昌市', '469005', '3');
INSERT INTO `jun_area` VALUES ('5140', '3420', '万宁市', '469006', '3');
INSERT INTO `jun_area` VALUES ('5141', '3420', '东方市', '469007', '3');
INSERT INTO `jun_area` VALUES ('5142', '3420', '定安县', '469021', '3');
INSERT INTO `jun_area` VALUES ('5143', '3420', '屯昌县', '469022', '3');
INSERT INTO `jun_area` VALUES ('5144', '3420', '澄迈县', '469023', '3');
INSERT INTO `jun_area` VALUES ('5145', '3420', '临高县', '469024', '3');
INSERT INTO `jun_area` VALUES ('5146', '3420', '白沙黎族自治县', '469025', '3');
INSERT INTO `jun_area` VALUES ('5147', '3420', '昌江黎族自治县', '469026', '3');
INSERT INTO `jun_area` VALUES ('5148', '3420', '乐东黎族自治县', '469027', '3');
INSERT INTO `jun_area` VALUES ('5149', '3420', '陵水黎族自治县', '469028', '3');
INSERT INTO `jun_area` VALUES ('5150', '3420', '保亭黎族苗族自治县', '469029', '3');
INSERT INTO `jun_area` VALUES ('5151', '3420', '琼中黎族苗族自治县', '469030', '3');
INSERT INTO `jun_area` VALUES ('5152', '3421', '石河子市', '659001', '3');
INSERT INTO `jun_area` VALUES ('5153', '3421', '阿拉尔市', '659002', '3');
INSERT INTO `jun_area` VALUES ('5154', '3421', '图木舒克市', '659003', '3');
INSERT INTO `jun_area` VALUES ('5155', '3421', '五家渠市', '659004', '3');
INSERT INTO `jun_area` VALUES ('5156', '151', '祥符区', '410212', '3');
INSERT INTO `jun_area` VALUES ('5158', '343', '滨海新区', '120116', '3');
INSERT INTO `jun_area` VALUES ('5159', '190', '随县', '421321', '3');
INSERT INTO `jun_area` VALUES ('5160', '146', '曹妃甸区', '130209', '3');
INSERT INTO `jun_area` VALUES ('5161', '139', '竞秀区', '130602', '3');
INSERT INTO `jun_area` VALUES ('5162', '206', '吉首市', '433101', '3');
INSERT INTO `jun_area` VALUES ('5163', '206', '泸溪县', '433122', '3');
INSERT INTO `jun_area` VALUES ('5164', '206', '凤凰县', '433123', '3');
INSERT INTO `jun_area` VALUES ('5165', '206', '花垣县', '433124', '3');
INSERT INTO `jun_area` VALUES ('5166', '206', '保靖县', '433125', '3');
INSERT INTO `jun_area` VALUES ('5167', '206', '古丈县', '433126', '3');
INSERT INTO `jun_area` VALUES ('5168', '206', '永顺县', '433127', '3');
INSERT INTO `jun_area` VALUES ('5169', '206', '龙山县', '433130', '3');
INSERT INTO `jun_area` VALUES ('5172', '260', '磴口县', '150822', '3');
INSERT INTO `jun_area` VALUES ('5173', '260', '乌拉特前旗', '150823', '3');
INSERT INTO `jun_area` VALUES ('5174', '260', '乌拉特中旗', '150824', '3');
INSERT INTO `jun_area` VALUES ('5175', '260', '乌拉特后旗', '150825', '3');
INSERT INTO `jun_area` VALUES ('5176', '260', '杭锦后旗', '150826', '3');
INSERT INTO `jun_area` VALUES ('5177', '267', '集宁区', '150902', '3');
INSERT INTO `jun_area` VALUES ('5178', '267', '卓资县', '150921', '3');
INSERT INTO `jun_area` VALUES ('5179', '267', '化德县', '150922', '3');
INSERT INTO `jun_area` VALUES ('5180', '267', '商都县', '150923', '3');
INSERT INTO `jun_area` VALUES ('5181', '267', '兴和县', '150924', '3');
INSERT INTO `jun_area` VALUES ('5182', '267', '凉城县', '150925', '3');
INSERT INTO `jun_area` VALUES ('5183', '267', '察哈尔右翼前旗', '150926', '3');
INSERT INTO `jun_area` VALUES ('5184', '267', '察哈尔右翼中旗', '150927', '3');
INSERT INTO `jun_area` VALUES ('5185', '267', '察哈尔右翼后期', '150928', '3');
INSERT INTO `jun_area` VALUES ('5186', '267', '四子王旗', '150929', '3');
INSERT INTO `jun_area` VALUES ('5187', '267', '丰镇市', '150981', '3');
INSERT INTO `jun_area` VALUES ('5188', '269', '乌兰浩特市', '152201', '3');
INSERT INTO `jun_area` VALUES ('5189', '269', '阿尔山市', '152202', '3');
INSERT INTO `jun_area` VALUES ('5190', '269', '科尔沁右翼前旗', '152221', '3');
INSERT INTO `jun_area` VALUES ('5191', '269', '科尔沁右翼中旗', '152222', '3');
INSERT INTO `jun_area` VALUES ('5192', '269', '扎赉特旗', '152223', '3');
INSERT INTO `jun_area` VALUES ('5193', '269', '突泉县', '152224', '3');
INSERT INTO `jun_area` VALUES ('5194', '268', '二连浩特市', '152501', '3');
INSERT INTO `jun_area` VALUES ('5195', '268', '锡林浩特市', '152502', '3');
INSERT INTO `jun_area` VALUES ('5196', '268', '阿巴嗄旗', '152522', '3');
INSERT INTO `jun_area` VALUES ('5197', '268', '苏尼特左旗', '152523', '3');
INSERT INTO `jun_area` VALUES ('5198', '268', '苏尼特右旗', '152524', '3');
INSERT INTO `jun_area` VALUES ('5199', '268', '东乌珠穆沁旗', '152525', '3');
INSERT INTO `jun_area` VALUES ('5200', '268', '西乌珠穆沁旗', '152526', '3');
INSERT INTO `jun_area` VALUES ('5201', '268', '太仆寺旗', '152527', '3');
INSERT INTO `jun_area` VALUES ('5202', '268', '镶黄旗', '152528', '3');
INSERT INTO `jun_area` VALUES ('5203', '268', '正镶白旗', '152529', '3');
INSERT INTO `jun_area` VALUES ('5204', '268', '正蓝旗', '152530', '3');
INSERT INTO `jun_area` VALUES ('5205', '268', '多伦县', '152531', '3');
INSERT INTO `jun_area` VALUES ('5206', '212', '昌邑区', '220202', '3');
INSERT INTO `jun_area` VALUES ('5207', '212', '龙潭区', '220203', '3');
INSERT INTO `jun_area` VALUES ('5208', '212', '船营区', '220204', '3');
INSERT INTO `jun_area` VALUES ('5209', '212', '丰满区', '220211', '3');
INSERT INTO `jun_area` VALUES ('5210', '212', '永吉县', '220221', '3');
INSERT INTO `jun_area` VALUES ('5211', '212', '蛟河市', '220281', '3');
INSERT INTO `jun_area` VALUES ('5212', '212', '桦甸市', '220282', '3');
INSERT INTO `jun_area` VALUES ('5213', '212', '舒兰市', '220283', '3');
INSERT INTO `jun_area` VALUES ('5214', '212', '磐石市', '220284', '3');
INSERT INTO `jun_area` VALUES ('5215', '219', '延吉市', '222401', '3');
INSERT INTO `jun_area` VALUES ('5216', '219', '图们市', '222402', '3');
INSERT INTO `jun_area` VALUES ('5217', '219', '敦化市', '222403', '3');
INSERT INTO `jun_area` VALUES ('5218', '219', '珲春市', '222404', '3');
INSERT INTO `jun_area` VALUES ('5219', '219', '龙井市', '222405', '3');
INSERT INTO `jun_area` VALUES ('5220', '219', '和龙市', '222406', '3');
INSERT INTO `jun_area` VALUES ('5221', '219', '汪清县', '222424', '3');
INSERT INTO `jun_area` VALUES ('5222', '219', '安图县', '222426', '3');
INSERT INTO `jun_area` VALUES ('5223', '169', '呼玛县', '232721', '3');
INSERT INTO `jun_area` VALUES ('5224', '169', '塔河县', '232722', '3');
INSERT INTO `jun_area` VALUES ('5225', '169', '漠河县', '232723', '3');
INSERT INTO `jun_area` VALUES ('5227', '221', '姑苏区', '320508', '3');
INSERT INTO `jun_area` VALUES ('5229', '109', '龙圩区', '450406', '3');
INSERT INTO `jun_area` VALUES ('5230', '110', '福锦区', '450903', '3');
INSERT INTO `jun_area` VALUES ('5231', '99', '靖西市', '451081', '3');
INSERT INTO `jun_area` VALUES ('5232', '330', '利州区', '510802', '3');
INSERT INTO `jun_area` VALUES ('5233', '330', '昭化区', '510811', '3');
INSERT INTO `jun_area` VALUES ('5234', '3401', '庐江县', '340124', '3');
INSERT INTO `jun_area` VALUES ('5235', '3401', '巢湖市', '340181', '3');
INSERT INTO `jun_area` VALUES ('5236', '49', '无为县', '340225', '3');
INSERT INTO `jun_area` VALUES ('5237', '46', '博望区', '340506', '3');
INSERT INTO `jun_area` VALUES ('5238', '46', '含山县', '340522', '3');
INSERT INTO `jun_area` VALUES ('5239', '46', '和县', '340523', '3');
INSERT INTO `jun_area` VALUES ('5240', '329', '前锋区', '511603', '3');
INSERT INTO `jun_area` VALUES ('5241', '326', '达州区', '511703', '3');
INSERT INTO `jun_area` VALUES ('5242', '325', '恩阳区', '511903', '3');
INSERT INTO `jun_area` VALUES ('5243', '324', '汶川县', '513221', '3');
INSERT INTO `jun_area` VALUES ('5244', '324', '理县', '513222', '3');
INSERT INTO `jun_area` VALUES ('5245', '324', '茂县', '513223', '3');
INSERT INTO `jun_area` VALUES ('5246', '324', '松潘县', '513224', '3');
INSERT INTO `jun_area` VALUES ('5247', '324', '九寨沟县', '513225', '3');
INSERT INTO `jun_area` VALUES ('5248', '324', '金川县', '513226', '3');
INSERT INTO `jun_area` VALUES ('5249', '324', '小金县', '513227', '3');
INSERT INTO `jun_area` VALUES ('5250', '324', '黑水县', '513228', '3');
INSERT INTO `jun_area` VALUES ('5251', '324', '马尔康县', '513229', '3');
INSERT INTO `jun_area` VALUES ('5252', '324', '壤塘县', '513230', '3');
INSERT INTO `jun_area` VALUES ('5253', '324', '阿坝县', '513231', '3');
INSERT INTO `jun_area` VALUES ('5254', '324', '若尔盖县', '513232', '3');
INSERT INTO `jun_area` VALUES ('5255', '324', '红原县', '513233', '3');
INSERT INTO `jun_area` VALUES ('5256', '328', '康定市', '513301', '3');
INSERT INTO `jun_area` VALUES ('5257', '328', '泸定县', '513322', '3');
INSERT INTO `jun_area` VALUES ('5258', '328', '丹巴县', '513323', '3');
INSERT INTO `jun_area` VALUES ('5259', '328', '九龙县', '513324', '3');
INSERT INTO `jun_area` VALUES ('5260', '328', '雅江县', '513325', '3');
INSERT INTO `jun_area` VALUES ('5261', '328', '道孚县', '513326', '3');
INSERT INTO `jun_area` VALUES ('5262', '328', '炉霍县', '513327', '3');
INSERT INTO `jun_area` VALUES ('5263', '328', '甘孜县', '513328', '3');
INSERT INTO `jun_area` VALUES ('5264', '328', '新龙县', '513329', '3');
INSERT INTO `jun_area` VALUES ('5265', '328', '德格县', '513330', '3');
INSERT INTO `jun_area` VALUES ('5266', '328', '白玉县', '513331', '3');
INSERT INTO `jun_area` VALUES ('5267', '328', '石渠县', '513332', '3');
INSERT INTO `jun_area` VALUES ('5268', '328', '色达县', '513333', '3');
INSERT INTO `jun_area` VALUES ('5269', '328', '理塘县', '513334', '3');
INSERT INTO `jun_area` VALUES ('5270', '328', '巴塘县', '513335', '3');
INSERT INTO `jun_area` VALUES ('5271', '328', '乡城县', '513336', '3');
INSERT INTO `jun_area` VALUES ('5272', '328', '稻城县', '513337', '3');
INSERT INTO `jun_area` VALUES ('5273', '328', '得荣县', '513338', '3');
INSERT INTO `jun_area` VALUES ('5274', '332', '西昌市', '513401', '3');
INSERT INTO `jun_area` VALUES ('5275', '332', '木里藏族自治县', '513422', '3');
INSERT INTO `jun_area` VALUES ('5276', '332', '盐源县', '513423', '3');
INSERT INTO `jun_area` VALUES ('5277', '332', '德昌县', '513423', '3');
INSERT INTO `jun_area` VALUES ('5278', '332', '会理县', '513425', '3');
INSERT INTO `jun_area` VALUES ('5279', '332', '会东县', '513426', '3');
INSERT INTO `jun_area` VALUES ('5280', '332', '宁南县', '513427', '3');
INSERT INTO `jun_area` VALUES ('5281', '332', '普格县', '513428', '3');
INSERT INTO `jun_area` VALUES ('5282', '332', '布拖县', '513429', '3');
INSERT INTO `jun_area` VALUES ('5283', '332', '金阳县', '513430', '3');
INSERT INTO `jun_area` VALUES ('5284', '332', '昭觉县', '513431', '3');
INSERT INTO `jun_area` VALUES ('5285', '332', '喜德县', '513432', '3');
INSERT INTO `jun_area` VALUES ('5286', '332', '冕宁县', '513433', '3');
INSERT INTO `jun_area` VALUES ('5287', '332', '越西县', '513434', '3');
INSERT INTO `jun_area` VALUES ('5288', '332', '甘洛县', '513435', '3');
INSERT INTO `jun_area` VALUES ('5289', '332', '美姑县', '513436', '3');
INSERT INTO `jun_area` VALUES ('5290', '332', '雷波县', '513437', '3');
INSERT INTO `jun_area` VALUES ('5291', '111', '观山湖区', '520115', '3');
INSERT INTO `jun_area` VALUES ('5292', '113', '七星关区', '520502', '3');
INSERT INTO `jun_area` VALUES ('5293', '113', '大方县', '520521', '3');
INSERT INTO `jun_area` VALUES ('5294', '113', '黔西县', '520522', '3');
INSERT INTO `jun_area` VALUES ('5295', '113', '金沙县', '520523', '3');
INSERT INTO `jun_area` VALUES ('5296', '113', '织金县', '520524', '3');
INSERT INTO `jun_area` VALUES ('5297', '113', '纳雍县', '520524', '3');
INSERT INTO `jun_area` VALUES ('5298', '113', '威宁彝族回族苗族自治县', '520526', '3');
INSERT INTO `jun_area` VALUES ('5299', '113', '赫章县', '520527', '3');
INSERT INTO `jun_area` VALUES ('5300', '118', '碧江区', '520602', '3');
INSERT INTO `jun_area` VALUES ('5301', '118', '万山区', '520603', '3');
INSERT INTO `jun_area` VALUES ('5302', '118', '江口县', '5206021', '3');
INSERT INTO `jun_area` VALUES ('5303', '118', '玉屏同族自治县', '520622', '3');
INSERT INTO `jun_area` VALUES ('5304', '118', '石阡县', '520623', '3');
INSERT INTO `jun_area` VALUES ('5305', '118', '思南县', '520624', '3');
INSERT INTO `jun_area` VALUES ('5306', '118', '印江土家族自治县', '520625', '3');
INSERT INTO `jun_area` VALUES ('5307', '118', '德江县', '520626', '3');
INSERT INTO `jun_area` VALUES ('5308', '118', '沿河土家族', '520627', '3');
INSERT INTO `jun_area` VALUES ('5309', '118', '松桃苗族自治县', '520628', '3');
INSERT INTO `jun_area` VALUES ('5311', '117', '兴义市', '522301', '3');
INSERT INTO `jun_area` VALUES ('5312', '117', '兴仁县', '522322', '3');
INSERT INTO `jun_area` VALUES ('5313', '117', '普安县', '522323', '3');
INSERT INTO `jun_area` VALUES ('5314', '117', '晴隆县', '522324', '3');
INSERT INTO `jun_area` VALUES ('5315', '117', '贞丰县', '522325', '3');
INSERT INTO `jun_area` VALUES ('5316', '117', '望谟县', '522326', '3');
INSERT INTO `jun_area` VALUES ('5317', '117', '册亨县', '522327', '3');
INSERT INTO `jun_area` VALUES ('5318', '117', '安龙县', '522328', '3');
INSERT INTO `jun_area` VALUES ('5319', '115', '凯里市', '522601', '3');
INSERT INTO `jun_area` VALUES ('5320', '115', '黄平县', '522622', '3');
INSERT INTO `jun_area` VALUES ('5321', '115', '施秉县', '522623', '3');
INSERT INTO `jun_area` VALUES ('5322', '115', '三穗县', '522624', '3');
INSERT INTO `jun_area` VALUES ('5323', '115', '镇远县', '522625', '3');
INSERT INTO `jun_area` VALUES ('5324', '115', '岑巩县', '522626', '3');
INSERT INTO `jun_area` VALUES ('5325', '115', '天柱县', '622627', '3');
INSERT INTO `jun_area` VALUES ('5326', '115', '锦屏县', '522628', '3');
INSERT INTO `jun_area` VALUES ('5327', '115', '剑河县', '522629', '3');
INSERT INTO `jun_area` VALUES ('5328', '238', '共青城市', '360482', '3');
INSERT INTO `jun_area` VALUES ('5329', '115', '台江县', '522630', '3');
INSERT INTO `jun_area` VALUES ('5330', '115', '黎平县', '522631', '3');
INSERT INTO `jun_area` VALUES ('5331', '115', '榕江县', '622632', '3');
INSERT INTO `jun_area` VALUES ('5332', '115', '从江县', '522633', '3');
INSERT INTO `jun_area` VALUES ('5333', '115', '雷山县', '522634', '3');
INSERT INTO `jun_area` VALUES ('5334', '115', '麻江县', '522635', '3');
INSERT INTO `jun_area` VALUES ('5335', '115', '丹寨县', '522636', '3');
INSERT INTO `jun_area` VALUES ('5336', '116', '都均市', '522701', '3');
INSERT INTO `jun_area` VALUES ('5337', '116', '福泉市', '522702', '3');
INSERT INTO `jun_area` VALUES ('5338', '116', '荔波县', '522722', '3');
INSERT INTO `jun_area` VALUES ('5339', '116', '贵定县', '522723', '3');
INSERT INTO `jun_area` VALUES ('5340', '116', '瓮安县	', '522725', '3');
INSERT INTO `jun_area` VALUES ('5341', '116', '独山县', '522726', '3');
INSERT INTO `jun_area` VALUES ('5342', '116', '平塘县', '522727', '3');
INSERT INTO `jun_area` VALUES ('5343', '116', '罗甸县', '522728', '3');
INSERT INTO `jun_area` VALUES ('5344', '116', '长顺县', '522729', '3');
INSERT INTO `jun_area` VALUES ('5345', '116', '龙里县', '522730', '3');
INSERT INTO `jun_area` VALUES ('5346', '116', '惠水县', '522731', '3');
INSERT INTO `jun_area` VALUES ('5347', '116', '三都水族自治县', '522732', '3');
INSERT INTO `jun_area` VALUES ('5348', '369', '思茅区', '530802', '3');
INSERT INTO `jun_area` VALUES ('5354', '369', '江城哈尼族彝族自治县', '530826', '3');
INSERT INTO `jun_area` VALUES ('5355', '369', '孟连傣族拉祜族佤族自治县', '530827', '3');
INSERT INTO `jun_area` VALUES ('5356', '369', '澜沧拉祜族自治县', '530828', '3');
INSERT INTO `jun_area` VALUES ('5357', '369', '西盟佤族自治县', '530829', '3');
INSERT INTO `jun_area` VALUES ('5358', '372', '楚雄市', '532301', '3');
INSERT INTO `jun_area` VALUES ('5359', '372', '双柏县', '532322', '3');
INSERT INTO `jun_area` VALUES ('5360', '372', '牟定县', '532323', '3');
INSERT INTO `jun_area` VALUES ('5361', '372', '南华县', '532324', '3');
INSERT INTO `jun_area` VALUES ('5362', '372', '姚安县', '532325', '3');
INSERT INTO `jun_area` VALUES ('5363', '372', '大姚县', '532326', '3');
INSERT INTO `jun_area` VALUES ('5364', '372', '永仁县', '532327', '3');
INSERT INTO `jun_area` VALUES ('5365', '372', '元谋县', '532328', '3');
INSERT INTO `jun_area` VALUES ('5366', '372', '武定县', '532329', '3');
INSERT INTO `jun_area` VALUES ('5367', '372', '禄丰县', '532331', '3');
INSERT INTO `jun_area` VALUES ('5368', '376', '个旧市', '532501', '3');
INSERT INTO `jun_area` VALUES ('5369', '376', '开远市', '532502', '3');
INSERT INTO `jun_area` VALUES ('5370', '376', '蒙自市', '532503', '3');
INSERT INTO `jun_area` VALUES ('5371', '376', '弥勒市', '532504', '3');
INSERT INTO `jun_area` VALUES ('5372', '376', '屏边苗族自治县', '532523', '3');
INSERT INTO `jun_area` VALUES ('5373', '376', '建水县', '532524', '3');
INSERT INTO `jun_area` VALUES ('5374', '376', '石屏县', '532525', '3');
INSERT INTO `jun_area` VALUES ('5375', '376', '泸西县', '532527', '3');
INSERT INTO `jun_area` VALUES ('5376', '376', '元阳县', '532528', '3');
INSERT INTO `jun_area` VALUES ('5377', '376', '红河县', '532529', '3');
INSERT INTO `jun_area` VALUES ('5378', '376', '金平苗族瑶族傣族自治县', '532530', '3');
INSERT INTO `jun_area` VALUES ('5379', '376', '绿春县', '532531', '3');
INSERT INTO `jun_area` VALUES ('5380', '376', '河口瑶族自治县', '532532', '3');
INSERT INTO `jun_area` VALUES ('5381', '379', '文山市', '532601', '3');
INSERT INTO `jun_area` VALUES ('5382', '379', '砚山县', '532622', '3');
INSERT INTO `jun_area` VALUES ('5383', '379', '西畴县', '532623', '3');
INSERT INTO `jun_area` VALUES ('5384', '379', '麻栗坡县', '532624', '3');
INSERT INTO `jun_area` VALUES ('5385', '379', '马关县', '532625', '3');
INSERT INTO `jun_area` VALUES ('5386', '379', '丘北县', '532626', '3');
INSERT INTO `jun_area` VALUES ('5387', '379', '广南县', '532627', '3');
INSERT INTO `jun_area` VALUES ('5388', '379', '富宁县', '532628', '3');
INSERT INTO `jun_area` VALUES ('5389', '380', '景洪市', '532801', '3');
INSERT INTO `jun_area` VALUES ('5390', '380', '勐海县', '532822', '3');
INSERT INTO `jun_area` VALUES ('5391', '380', '勐腊县', '532823', '3');
INSERT INTO `jun_area` VALUES ('5392', '373', '大理市', '532901', '3');
INSERT INTO `jun_area` VALUES ('5393', '373', '漾濞彝族自治县', '532922', '3');
INSERT INTO `jun_area` VALUES ('5394', '373', '祥云县', '532923', '3');
INSERT INTO `jun_area` VALUES ('5395', '373', '宾川县', '532924', '3');
INSERT INTO `jun_area` VALUES ('5396', '373', '弥渡县', '532925', '3');
INSERT INTO `jun_area` VALUES ('5397', '373', '南涧彝族自治县', '532926', '3');
INSERT INTO `jun_area` VALUES ('5398', '373', '巍山彝族回族自治县', '532927', '3');
INSERT INTO `jun_area` VALUES ('5399', '373', '永平县', '532928', '3');
INSERT INTO `jun_area` VALUES ('5400', '373', '云龙县', '532929', '3');
INSERT INTO `jun_area` VALUES ('5401', '373', '洱源县', '532930', '3');
INSERT INTO `jun_area` VALUES ('5402', '373', '剑川县', '532931', '3');
INSERT INTO `jun_area` VALUES ('5403', '373', '鹤庆县', '532932', '3');
INSERT INTO `jun_area` VALUES ('5404', '374', '瑞丽市', '533102', '3');
INSERT INTO `jun_area` VALUES ('5405', '374', '芒市', '533103', '3');
INSERT INTO `jun_area` VALUES ('5406', '374', '梁河县', '533122', '3');
INSERT INTO `jun_area` VALUES ('5407', '374', '盈江县', '533123', '3');
INSERT INTO `jun_area` VALUES ('5408', '374', '陇川县', '533124', '3');
INSERT INTO `jun_area` VALUES ('5409', '368', '泸水县', '533321', '3');
INSERT INTO `jun_area` VALUES ('5410', '368', '福贡县', '533323', '3');
INSERT INTO `jun_area` VALUES ('5411', '368', '贡山独龙族怒族自治县', '533324', '3');
INSERT INTO `jun_area` VALUES ('5412', '368', '兰坪白族普米族自治县', '533325', '3');
INSERT INTO `jun_area` VALUES ('5413', '375', '香格里拉市', '533401', '3');
INSERT INTO `jun_area` VALUES ('5414', '375', '德钦县', '533422', '3');
INSERT INTO `jun_area` VALUES ('5415', '375', '维西傈僳族自治县', '533423', '3');
INSERT INTO `jun_area` VALUES ('5416', '349', '桑珠孜区', '540202', '3');
INSERT INTO `jun_area` VALUES ('5417', '349', '南木林县', '540221', '3');
INSERT INTO `jun_area` VALUES ('5418', '349', '江孜县', '540222', '3');
INSERT INTO `jun_area` VALUES ('5419', '349', '定日县', '540223', '3');
INSERT INTO `jun_area` VALUES ('5420', '349', '萨迦县', '540224', '3');
INSERT INTO `jun_area` VALUES ('5421', '349', '拉孜县', '540225', '3');
INSERT INTO `jun_area` VALUES ('5422', '349', '昂仁县', '540226', '3');
INSERT INTO `jun_area` VALUES ('5423', '349', '谢通门县', '540227', '3');
INSERT INTO `jun_area` VALUES ('5424', '349', '白朗县', '540228', '3');
INSERT INTO `jun_area` VALUES ('5425', '349', '仁布县', '540229', '3');
INSERT INTO `jun_area` VALUES ('5426', '349', '康马县', '540230', '3');
INSERT INTO `jun_area` VALUES ('5427', '349', '定结县', '540231', '3');
INSERT INTO `jun_area` VALUES ('5428', '349', '仲巴县', '540232', '3');
INSERT INTO `jun_area` VALUES ('5429', '349', '亚东县', '540233', '3');
INSERT INTO `jun_area` VALUES ('5430', '349', '吉隆县', '540234', '3');
INSERT INTO `jun_area` VALUES ('5431', '349', '涅拉木县', '540235', '3');
INSERT INTO `jun_area` VALUES ('5432', '349', '萨嘎县', '540236', '3');
INSERT INTO `jun_area` VALUES ('5433', '349', '岗巴县', '540237', '3');
INSERT INTO `jun_area` VALUES ('5434', '346', '卡诺区', '540302', '3');
INSERT INTO `jun_area` VALUES ('5435', '346', '江达县', '540321', '3');
INSERT INTO `jun_area` VALUES ('5436', '346', '贡觉县', '540322', '3');
INSERT INTO `jun_area` VALUES ('5437', '346', '类乌齐县', '540323', '3');
INSERT INTO `jun_area` VALUES ('5438', '346', '丁青县', '540324', '3');
INSERT INTO `jun_area` VALUES ('5439', '346', '察雅县', '540325', '3');
INSERT INTO `jun_area` VALUES ('5440', '346', '八宿县', '540326', '3');
INSERT INTO `jun_area` VALUES ('5441', '346', '左贡县', '540327', '3');
INSERT INTO `jun_area` VALUES ('5442', '346', '芒康县', '540328', '3');
INSERT INTO `jun_area` VALUES ('5443', '346', '洛隆县', '540329', '3');
INSERT INTO `jun_area` VALUES ('5444', '346', '边坝县', '540330', '3');
INSERT INTO `jun_area` VALUES ('5445', '347', '巴宜区', '540402', '3');
INSERT INTO `jun_area` VALUES ('5446', '347', '工布江达县', '540421', '3');
INSERT INTO `jun_area` VALUES ('5447', '347', '米林县', '540422', '3');
INSERT INTO `jun_area` VALUES ('5448', '347', '墨脱县', '540423', '3');
INSERT INTO `jun_area` VALUES ('5449', '347', '波密县', '540424', '3');
INSERT INTO `jun_area` VALUES ('5450', '347', '察偶县', '540425', '3');
INSERT INTO `jun_area` VALUES ('5451', '347', '朗县', '540426', '3');
INSERT INTO `jun_area` VALUES ('5452', '350', '乃东县', '542221', '3');
INSERT INTO `jun_area` VALUES ('5453', '350', '扎囊县', '542222', '3');
INSERT INTO `jun_area` VALUES ('5454', '350', '贡嘎县', '542223', '3');
INSERT INTO `jun_area` VALUES ('5455', '350', '桑日县', '542224', '3');
INSERT INTO `jun_area` VALUES ('5456', '350', '琼结县', '542225', '3');
INSERT INTO `jun_area` VALUES ('5457', '350', '曲松县', '542226', '3');
INSERT INTO `jun_area` VALUES ('5458', '350', '措美县', '542227', '3');
INSERT INTO `jun_area` VALUES ('5459', '350', '洛扎县', '542228', '3');
INSERT INTO `jun_area` VALUES ('5460', '350', '加查县', '542229', '3');
INSERT INTO `jun_area` VALUES ('5461', '350', '隆子县', '542231', '3');
INSERT INTO `jun_area` VALUES ('5462', '350', '错那县', '542232', '3');
INSERT INTO `jun_area` VALUES ('5463', '350', '浪卡子县', '542233', '3');
INSERT INTO `jun_area` VALUES ('5464', '348', '那曲县', '542421', '3');
INSERT INTO `jun_area` VALUES ('5465', '348', '嘉黎县', '542422', '3');
INSERT INTO `jun_area` VALUES ('5466', '348', '比如县', '542423', '3');
INSERT INTO `jun_area` VALUES ('5467', '348', '聂荣县', '542424', '3');
INSERT INTO `jun_area` VALUES ('5468', '348', '安多县', '542425', '3');
INSERT INTO `jun_area` VALUES ('5469', '348', '申扎县', '542426', '3');
INSERT INTO `jun_area` VALUES ('5470', '348', '索县', '542427', '3');
INSERT INTO `jun_area` VALUES ('5471', '348', '班戈县', '542428', '3');
INSERT INTO `jun_area` VALUES ('5472', '348', '巴青县', '542429', '3');
INSERT INTO `jun_area` VALUES ('5473', '348', '尼玛县', '542430', '3');
INSERT INTO `jun_area` VALUES ('5474', '348', '双湖县', '542431', '3');
INSERT INTO `jun_area` VALUES ('5475', '345', '普兰县', '542521', '3');
INSERT INTO `jun_area` VALUES ('5476', '345', '札达县', '542522', '3');
INSERT INTO `jun_area` VALUES ('5477', '345', '噶尔县', '542523', '3');
INSERT INTO `jun_area` VALUES ('5478', '345', '日土县', '542524', '3');
INSERT INTO `jun_area` VALUES ('5479', '345', '革吉县', '542525', '3');
INSERT INTO `jun_area` VALUES ('5480', '345', '改则县', '542526', '3');
INSERT INTO `jun_area` VALUES ('5481', '345', '措勤县', '542527', '3');
INSERT INTO `jun_area` VALUES ('5482', '69', '临夏市', '522901', '3');
INSERT INTO `jun_area` VALUES ('5483', '69', '临夏县', '622921', '3');
INSERT INTO `jun_area` VALUES ('5484', '69', '康乐县', '622922', '3');
INSERT INTO `jun_area` VALUES ('5485', '69', '永靖县', '922923', '3');
INSERT INTO `jun_area` VALUES ('5486', '69', '广河县', '622924', '3');
INSERT INTO `jun_area` VALUES ('5487', '69', '和政县', '622925', '3');
INSERT INTO `jun_area` VALUES ('5488', '69', '东乡族自治县', '922926', '3');
INSERT INTO `jun_area` VALUES ('5489', '69', '积石山保安族东乡族撒拉族自治县', '622927', '3');
INSERT INTO `jun_area` VALUES ('5490', '65', '合作市', '623001', '3');
INSERT INTO `jun_area` VALUES ('5491', '65', '临潭市', '623021', '3');
INSERT INTO `jun_area` VALUES ('5492', '65', '卓尼县', '623022', '3');
INSERT INTO `jun_area` VALUES ('5493', '65', '舟曲县', '621023', '3');
INSERT INTO `jun_area` VALUES ('5494', '65', '迭部县', '623024', '3');
INSERT INTO `jun_area` VALUES ('5495', '65', '玛曲县', '623025', '3');
INSERT INTO `jun_area` VALUES ('5496', '65', '碌曲县', '623026', '3');
INSERT INTO `jun_area` VALUES ('5497', '65', '夏河县', '623026', '3');
INSERT INTO `jun_area` VALUES ('5498', '278', '乐都区', '630202', '3');
INSERT INTO `jun_area` VALUES ('5499', '278', '平安区', '630203', '3');
INSERT INTO `jun_area` VALUES ('5500', '278', '明河回族土族自治县', '630222', '3');
INSERT INTO `jun_area` VALUES ('5501', '278', '互助土族自治县', '630223', '3');
INSERT INTO `jun_area` VALUES ('5502', '278', '化隆回族自治县', '630224', '3');
INSERT INTO `jun_area` VALUES ('5503', '278', '循化撒拉族自治县', '630225', '3');
INSERT INTO `jun_area` VALUES ('5504', '277', '门源回族自治县', '632221', '3');
INSERT INTO `jun_area` VALUES ('5505', '277', '祁连县', '632222', '3');
INSERT INTO `jun_area` VALUES ('5506', '277', '海晏县', '632223', '3');
INSERT INTO `jun_area` VALUES ('5507', '277', '刚察县', '632224', '3');
INSERT INTO `jun_area` VALUES ('5508', '281', '同仁县', '632321', '3');
INSERT INTO `jun_area` VALUES ('5509', '281', '尖扎县', '632322', '3');
INSERT INTO `jun_area` VALUES ('5510', '281', '泽库县', '632323', '3');
INSERT INTO `jun_area` VALUES ('5511', '281', '河南蒙古族自治县', '632324', '3');
INSERT INTO `jun_area` VALUES ('5512', '279', '共和县', '632521', '3');
INSERT INTO `jun_area` VALUES ('5513', '279', '同德县', '632522', '3');
INSERT INTO `jun_area` VALUES ('5514', '279', '贵德县', '632523', '3');
INSERT INTO `jun_area` VALUES ('5515', '279', '兴海县', '632524', '3');
INSERT INTO `jun_area` VALUES ('5516', '279', '贵南县', '632525', '3');
INSERT INTO `jun_area` VALUES ('5517', '276', ' 玛沁县', '632621', '3');
INSERT INTO `jun_area` VALUES ('5518', '276', '班玛县', '632622', '3');
INSERT INTO `jun_area` VALUES ('5519', '276', '甘德县', '632623', '3');
INSERT INTO `jun_area` VALUES ('5520', '276', '达日县', '632624', '3');
INSERT INTO `jun_area` VALUES ('5521', '276', '久治县', '632625', '3');
INSERT INTO `jun_area` VALUES ('5522', '276', '玛多县', '632626', '3');
INSERT INTO `jun_area` VALUES ('5523', '282', '玉树市', '632701', '3');
INSERT INTO `jun_area` VALUES ('5524', '282', '杂多县', '632722', '3');
INSERT INTO `jun_area` VALUES ('5525', '282', '称多县', '632723', '3');
INSERT INTO `jun_area` VALUES ('5526', '282', '治多县', '632724', '3');
INSERT INTO `jun_area` VALUES ('5527', '282', '囊谦县', '632725', '3');
INSERT INTO `jun_area` VALUES ('5528', '282', '曲麻莱县', '632726', '3');
INSERT INTO `jun_area` VALUES ('5529', '280', '格尔木市', '632801', '3');
INSERT INTO `jun_area` VALUES ('5530', '280', '德令哈市', '632802', '3');
INSERT INTO `jun_area` VALUES ('5531', '280', '乌兰县', '632821', '3');
INSERT INTO `jun_area` VALUES ('5532', '280', '都兰县', '632822', '3');
INSERT INTO `jun_area` VALUES ('5533', '280', '天峻县', '632823', '3');
INSERT INTO `jun_area` VALUES ('5534', '273', '红寺堡区', '640303', '3');
INSERT INTO `jun_area` VALUES ('5535', '364', '高昌区', '650402', '3');
INSERT INTO `jun_area` VALUES ('5536', '364', '鄯善县', '650421', '3');
INSERT INTO `jun_area` VALUES ('5537', '364', '托克逊县', '650422', '3');
INSERT INTO `jun_area` VALUES ('5538', '357', '哈密市', '652201', '3');
INSERT INTO `jun_area` VALUES ('5539', '357', '巴里坤哈萨克自治县', '652222', '3');
INSERT INTO `jun_area` VALUES ('5540', '357', '伊吾县', '652223', '3');
INSERT INTO `jun_area` VALUES ('5541', '356', '昌吉市', '652301', '3');
INSERT INTO `jun_area` VALUES ('5542', '356', '阜康市', '652302', '3');
INSERT INTO `jun_area` VALUES ('5543', '356', '呼图壁县', '652323', '3');
INSERT INTO `jun_area` VALUES ('5544', '356', '玛纳斯县', '652324', '3');
INSERT INTO `jun_area` VALUES ('5545', '356', '奇台县', '652325', '3');
INSERT INTO `jun_area` VALUES ('5546', '356', '吉木萨尔县', '652327', '3');
INSERT INTO `jun_area` VALUES ('5547', '356', '木垒哈萨克自治县', '652328', '3');
INSERT INTO `jun_area` VALUES ('5548', '355', '博乐市', '652701', '3');
INSERT INTO `jun_area` VALUES ('5549', '355', '阿拉山口市', '652702', '3');
INSERT INTO `jun_area` VALUES ('5550', '355', '精河县', '652722', '3');
INSERT INTO `jun_area` VALUES ('5551', '355', '温泉县', '652723', '3');
INSERT INTO `jun_area` VALUES ('5552', '354', '库尔勒市', '652801', '3');
INSERT INTO `jun_area` VALUES ('5553', '354', '轮台县', '652822', '3');
INSERT INTO `jun_area` VALUES ('5554', '354', '尉犁县', '652823', '3');
INSERT INTO `jun_area` VALUES ('5555', '354', '若羌县', '652824', '3');
INSERT INTO `jun_area` VALUES ('5556', '354', '且末县', '652825', '3');
INSERT INTO `jun_area` VALUES ('5557', '354', '焉耆回族自治县', '652826', '3');
INSERT INTO `jun_area` VALUES ('5558', '354', '和静县', '652827', '3');
INSERT INTO `jun_area` VALUES ('5559', '354', '和硕县', '652828', '3');
INSERT INTO `jun_area` VALUES ('5560', '354', '博湖县', '652829', '3');
INSERT INTO `jun_area` VALUES ('5561', '352', '阿克苏市', '652901', '3');
INSERT INTO `jun_area` VALUES ('5562', '352', '温宿县', '652922', '3');
INSERT INTO `jun_area` VALUES ('5563', '352', '库车县', '652923', '3');
INSERT INTO `jun_area` VALUES ('5564', '352', '沙雅县', '652924', '3');
INSERT INTO `jun_area` VALUES ('5565', '352', '新和县', '652925', '3');
INSERT INTO `jun_area` VALUES ('5566', '352', '拜城县', '652926', '3');
INSERT INTO `jun_area` VALUES ('5567', '352', '乌什县', '652927', '3');
INSERT INTO `jun_area` VALUES ('5568', '352', '阿凡提县', '652928', '3');
INSERT INTO `jun_area` VALUES ('5569', '352', '柯坪县', '652929', '3');
INSERT INTO `jun_area` VALUES ('5570', '361', '阿图什市', '653001', '3');
INSERT INTO `jun_area` VALUES ('5571', '361', '阿克陶县', '653022', '3');
INSERT INTO `jun_area` VALUES ('5572', '361', '阿合奇县', '653023', '3');
INSERT INTO `jun_area` VALUES ('5573', '361', '乌恰县', '653024', '3');
INSERT INTO `jun_area` VALUES ('5574', '359', '喀什市', '653101', '3');
INSERT INTO `jun_area` VALUES ('5575', '359', '疏附县', '653121', '3');
INSERT INTO `jun_area` VALUES ('5576', '359', '疏勒县', '653122', '3');
INSERT INTO `jun_area` VALUES ('5577', '359', '英吉沙县', '653123', '3');
INSERT INTO `jun_area` VALUES ('5578', '359', '泽普县', '653124', '3');
INSERT INTO `jun_area` VALUES ('5579', '359', '莎车县', '653125', '3');
INSERT INTO `jun_area` VALUES ('5580', '359', '叶城县', '653126', '3');
INSERT INTO `jun_area` VALUES ('5581', '359', '麦盖提县', '653127', '3');
INSERT INTO `jun_area` VALUES ('5582', '359', '岳普湖县', '653128', '3');
INSERT INTO `jun_area` VALUES ('5583', '359', '伽师县', '653129', '3');
INSERT INTO `jun_area` VALUES ('5584', '359', '巴楚县', '653130', '3');
INSERT INTO `jun_area` VALUES ('5585', '359', '塔什库尔干塔吉克自治县', '653131', '3');
INSERT INTO `jun_area` VALUES ('5586', '358', '和田市', '653201', '3');
INSERT INTO `jun_area` VALUES ('5587', '358', '和田县', '653221', '3');
INSERT INTO `jun_area` VALUES ('5588', '358', '墨玉县', '653222', '3');
INSERT INTO `jun_area` VALUES ('5589', '358', '皮山县', '653223', '3');
INSERT INTO `jun_area` VALUES ('5590', '358', '洛浦县', '653224', '3');
INSERT INTO `jun_area` VALUES ('5591', '358', '策勒县', '653225', '3');
INSERT INTO `jun_area` VALUES ('5592', '358', '于田县', '653226', '3');
INSERT INTO `jun_area` VALUES ('5593', '358', '民丰县', '653227', '3');
INSERT INTO `jun_area` VALUES ('5594', '366', '伊宁市', '654002', '3');
INSERT INTO `jun_area` VALUES ('5595', '366', '奎屯市', '654003', '3');
INSERT INTO `jun_area` VALUES ('5596', '366', '霍尔果斯市', '654004', '3');
INSERT INTO `jun_area` VALUES ('5597', '366', '伊宁县', '654021', '3');
INSERT INTO `jun_area` VALUES ('5598', '366', '察布查尔锡自治县', '654022', '3');
INSERT INTO `jun_area` VALUES ('5599', '366', '霍城县', '654023', '3');
INSERT INTO `jun_area` VALUES ('5600', '366', '巩留县', '654024', '3');
INSERT INTO `jun_area` VALUES ('5601', '366', '新源县', '654025', '3');
INSERT INTO `jun_area` VALUES ('5602', '366', '昭苏县', '654026', '3');
INSERT INTO `jun_area` VALUES ('5603', '366', '特克斯县', '654027', '3');
INSERT INTO `jun_area` VALUES ('5604', '366', '尼勒克县', '654028', '3');
INSERT INTO `jun_area` VALUES ('5605', '3423', '塔城市', '654201', '3');
INSERT INTO `jun_area` VALUES ('5606', '3423', '乌苏市', '654202', '3');
INSERT INTO `jun_area` VALUES ('5607', '3423', '额敏县', '654221', '3');
INSERT INTO `jun_area` VALUES ('5608', '3423', '沙湾县', '654223', '3');
INSERT INTO `jun_area` VALUES ('5609', '3423', '托里县', '654224', '3');
INSERT INTO `jun_area` VALUES ('5610', '3423', '裕民县', '654225', '3');
INSERT INTO `jun_area` VALUES ('5611', '3423', '和布克赛尔蒙古自治县', '654226', '3');
INSERT INTO `jun_area` VALUES ('5612', '366', '塔城地区', '654200', '3');
INSERT INTO `jun_area` VALUES ('5613', '366', '塔城市', '654201', '3');
INSERT INTO `jun_area` VALUES ('5614', '366', '乌苏市', '654202', '3');
INSERT INTO `jun_area` VALUES ('5615', '366', '额敏县', '654221', '3');
INSERT INTO `jun_area` VALUES ('5616', '366', '沙湾县', '654223', '3');
INSERT INTO `jun_area` VALUES ('5617', '366', '托里县', '654224', '3');
INSERT INTO `jun_area` VALUES ('5618', '366', '裕民县', '654225', '3');
INSERT INTO `jun_area` VALUES ('5619', '366', '和布克赛尔蒙古自治县', '654226', '3');
INSERT INTO `jun_area` VALUES ('5620', '366', '阿勒泰地区', '654300', '3');
INSERT INTO `jun_area` VALUES ('5621', '366', '阿勒泰市', '654301', '3');
INSERT INTO `jun_area` VALUES ('5622', '366', '布尔津县', '654321', '3');
INSERT INTO `jun_area` VALUES ('5623', '366', '富蕴县', '654322', '3');
INSERT INTO `jun_area` VALUES ('5624', '366', '福海县', '654323', '3');
INSERT INTO `jun_area` VALUES ('5625', '366', '哈巴河县', '654324', '3');
INSERT INTO `jun_area` VALUES ('5626', '366', '清河县', '654325', '3');
INSERT INTO `jun_area` VALUES ('5627', '366', '吉木乃县', '654326', '3');
INSERT INTO `jun_area` VALUES ('5628', '3425', '区级测试AAA', '004', '3');
INSERT INTO `jun_area` VALUES ('5629', '3425', '区级测试AAB', '002', '3');
INSERT INTO `jun_area` VALUES ('5630', '3426', '区级测试ABA', '001', '3');
INSERT INTO `jun_area` VALUES ('5631', '3426', '区级测试ABB', '002', '3');
INSERT INTO `jun_area` VALUES ('5632', '96', '横琴新区', '440402104', '3');
INSERT INTO `jun_area` VALUES ('5633', '138', '辛集市', '052360', '3');
INSERT INTO `jun_area` VALUES ('5634', '3429', '塔城市', '654201', '3');
INSERT INTO `jun_area` VALUES ('5635', '3429', '乌苏市', '654202', '3');
INSERT INTO `jun_area` VALUES ('5636', '3429', '额敏县', '654221', '3');
INSERT INTO `jun_area` VALUES ('5637', '3429', '沙湾县', '654223', '3');
INSERT INTO `jun_area` VALUES ('5638', '3429', '托里县', '654224', '3');
INSERT INTO `jun_area` VALUES ('5639', '3429', '裕民县', '654225', '3');
INSERT INTO `jun_area` VALUES ('5640', '3429', '和布克赛尔蒙古自治县', '654226', '3');
INSERT INTO `jun_area` VALUES ('5641', '3430', '阿勒泰市', '654301', '3');
INSERT INTO `jun_area` VALUES ('5642', '3430', '布尔津县', '654321', '3');
INSERT INTO `jun_area` VALUES ('5643', '3430', '富蕴县', '654322', '3');
INSERT INTO `jun_area` VALUES ('5644', '3430', '福海县', '654323', '3');
INSERT INTO `jun_area` VALUES ('5645', '3430', '哈巴河县', '654324', '3');
INSERT INTO `jun_area` VALUES ('5646', '3430', '青河县', '654325', '3');
INSERT INTO `jun_area` VALUES ('5647', '3430', '吉木乃县', '654326', '3');
INSERT INTO `jun_area` VALUES ('5648', '311', '高新区', '111111', '3');
INSERT INTO `jun_area` VALUES ('5649', '149', '航空港区', '11111', '3');

-- ----------------------------
-- Table structure for jun_black_ip
-- ----------------------------
DROP TABLE IF EXISTS `jun_black_ip`;
CREATE TABLE `jun_black_ip` (
  `bi_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `bi_ip` varchar(30) DEFAULT NULL COMMENT '封禁的IP地址',
  `bi_time` int(10) DEFAULT NULL COMMENT '添加时间',
  `bi_status` tinyint(1) DEFAULT '1' COMMENT '状态 1|2 启用|禁用',
  `m_id` int(11) DEFAULT NULL COMMENT '管理员ID',
  PRIMARY KEY (`bi_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='黑名单IP管理';

-- ----------------------------
-- Records of jun_black_ip
-- ----------------------------

-- ----------------------------
-- Table structure for jun_cmd_admin
-- ----------------------------
DROP TABLE IF EXISTS `jun_cmd_admin`;
CREATE TABLE `jun_cmd_admin` (
  `ca_id` int(11) NOT NULL AUTO_INCREMENT,
  `ca_nick` varchar(45) DEFAULT NULL COMMENT '昵称',
  `ca_name` varchar(30) NOT NULL COMMENT '用户名',
  `ca_pwd` varchar(35) DEFAULT NULL COMMENT '密码(md5+注册时间)',
  `ca_add_time` int(10) DEFAULT NULL COMMENT '注册时间',
  `ca_status` tinyint(1) DEFAULT '1' COMMENT '状态 0关闭 1开启',
  PRIMARY KEY (`ca_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='CMD工具-账号表';

-- ----------------------------
-- Records of jun_cmd_admin
-- ----------------------------
INSERT INTO `jun_cmd_admin` VALUES ('1', '超级账号', 'admin', '5b72613633647bf23556bb404c74745d', '1542850535', '1');
INSERT INTO `jun_cmd_admin` VALUES ('3', '', 'test123', '73bb004e55250d3143addf0e06a09ce2', '1542956581', '1');

-- ----------------------------
-- Table structure for jun_cmd_admin_action_log
-- ----------------------------
DROP TABLE IF EXISTS `jun_cmd_admin_action_log`;
CREATE TABLE `jun_cmd_admin_action_log` (
  `caa_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `ca_id` int(11) DEFAULT NULL COMMENT 'CMD账号ID',
  `caa_ip` varchar(15) DEFAULT NULL COMMENT '提交时的IP',
  `caa_content` varchar(1024) DEFAULT NULL COMMENT '命令行',
  `caa_time` int(10) DEFAULT NULL COMMENT '操作时间',
  PRIMARY KEY (`caa_id`),
  KEY `m_id` (`ca_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='CMD工具-命令行提交记录';

-- ----------------------------
-- Records of jun_cmd_admin_action_log
-- ----------------------------

-- ----------------------------
-- Table structure for jun_cmd_admin_login_log
-- ----------------------------
DROP TABLE IF EXISTS `jun_cmd_admin_login_log`;
CREATE TABLE `jun_cmd_admin_login_log` (
  `cal_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `ca_id` int(11) DEFAULT NULL COMMENT 'cmd账号ID',
  `cal_ip` varchar(15) DEFAULT NULL COMMENT '登录IP',
  `cal_time` int(10) DEFAULT NULL COMMENT '登录时间',
  `cal_province` varchar(15) DEFAULT NULL COMMENT '登录地址省',
  `cal_city` varchar(25) DEFAULT NULL COMMENT '登录地址市',
  `cal_area` varchar(25) DEFAULT NULL COMMENT '登录地址区',
  PRIMARY KEY (`cal_id`),
  KEY `m_id` (`ca_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='CMD工具-账号登录日志';

-- ----------------------------
-- Records of jun_cmd_admin_login_log
-- ----------------------------

-- ----------------------------
-- Table structure for jun_config
-- ----------------------------
DROP TABLE IF EXISTS `jun_config`;
CREATE TABLE `jun_config` (
  `id` tinyint(1) NOT NULL,
  `sms_status` tinyint(3) NOT NULL DEFAULT '0' COMMENT '短信接口开启状态 0|1 关闭|秒嘀',
  `miaodi_account_sid` varchar(64) DEFAULT NULL COMMENT '秒嘀的ACCOUNT SID',
  `miaodi_template_id` varchar(24) DEFAULT NULL COMMENT '秒嘀的模板ID',
  `miaodi_auth_token` varchar(64) DEFAULT NULL COMMENT '秒嘀的AUTH TOKEN',
  `email_name` varchar(38) DEFAULT NULL COMMENT '你的邮箱账号',
  `email_pwd` varchar(30) DEFAULT NULL COMMENT '你的邮箱密码',
  `email_host` varchar(68) DEFAULT NULL COMMENT '邮箱服务商域名',
  `email_charset` varchar(10) DEFAULT NULL COMMENT '邮箱使用的字符集',
  `email_port` int(10) DEFAULT NULL COMMENT '邮箱发送的端口号',
  `alidayu_app_key` varchar(64) DEFAULT NULL COMMENT '阿里大鱼-APP KEY',
  `alidayu_secret_key` varchar(64) DEFAULT NULL COMMENT '阿里大鱼-SECRET KEY',
  `alidayu_sign_name` varchar(64) DEFAULT NULL COMMENT '阿里大鱼-短信签名',
  `alidayu_code` varchar(24) DEFAULT NULL COMMENT '阿里大鱼-模板ID',
  `qiniu_size` varchar(15) DEFAULT NULL COMMENT '全站上传大小限制',
  `qiniu_class` varchar(64) DEFAULT NULL COMMENT '全站上传类型限制',
  `qiniu_zip` tinyint(1) DEFAULT '0' COMMENT '是否需要压缩图片 0|1 关闭|压缩',
  `qiniu_status` tinyint(1) DEFAULT '0' COMMENT '是否开启七牛云存储 0|1 关闭|开启',
  `qiniu_access_key` varchar(64) DEFAULT NULL COMMENT '七牛云-ACCESS KEY',
  `qiniu_secret_key` varchar(64) DEFAULT NULL COMMENT '七牛云-SECRET KEY',
  `qiniu_space` varchar(64) DEFAULT NULL COMMENT '七牛云-空间名',
  `qiniu_website` varchar(98) DEFAULT NULL COMMENT '七牛云-预览网址',
  `weixin_login_ype` tinyint(1) DEFAULT '1' COMMENT '微信登录授权方式 0|1 动态|静默',
  `weixin_appsecret` varchar(64) DEFAULT NULL COMMENT '微信开发者密码',
  `weixin_appid` varchar(32) DEFAULT NULL COMMENT '微信开发者ID',
  `weixin_token` varchar(64) DEFAULT NULL COMMENT '微信Token令牌',
  `weixin_aeskey` varchar(98) DEFAULT NULL COMMENT '微信消息加解密密钥',
  `weixin_moban_id` varchar(98) DEFAULT NULL COMMENT '微信一次性订阅模版ID',
  `weixin_menu` text COMMENT '微信自定义菜单的JSON',
  `weixin_actoken_time` int(10) DEFAULT '6600' COMMENT '微信普通actoken缓存有效时间（秒）',
  `weixin_debug` tinyint(1) DEFAULT '3' COMMENT '是否开启微信debug模式 1|2|3 不追加|追加日志|不生成日志',
  `weixin_vif` tinyint(1) DEFAULT '0' COMMENT '微信认证状态 0|1 未认证|已认证',
  `weixin_auto` tinyint(1) DEFAULT '0' COMMENT '微信自动回复中，是否开启juncms文本自动回复功能',
  `weixin_mchid` varchar(20) DEFAULT NULL COMMENT '微信支付-商户ID',
  `weixin_key` varchar(255) DEFAULT NULL COMMENT '微信支付-支付密钥',
  `weixin_sslcert_path` varchar(180) DEFAULT NULL COMMENT '微信支付-cert证书地址',
  `weixin_sslkey_path` varchar(180) DEFAULT NULL COMMENT '微信支付-key证书地址',
  `weixin_curl_host` varchar(30) DEFAULT NULL COMMENT '微信支付-CURL代理IP',
  `weixin_curl_port` varchar(10) DEFAULT NULL COMMENT '微信支付-CURL代理端口号',
  `weixin_level` tinyint(1) DEFAULT '1' COMMENT '微信支付-错误信息上报等级，上报等级，0.关闭上报; 1.仅错误出错上报; 2.全量上报',
  `weixin_jsapi_return` varchar(255) DEFAULT NULL COMMENT '微信支付-JSAPI支付回调地址',
  `weixin_qrcode_return` varchar(255) DEFAULT NULL COMMENT '微信支付-扫码支付模式二-支付回调地址',
  `express_status` tinyint(1) DEFAULT '0' COMMENT '快递查询接口 0|1|2 关闭|快递100|kdcx.cn',
  `oauth_url` varchar(120) DEFAULT NULL COMMENT '第三方登录-统一回调地址',
  `oauth_sn_appid` varchar(64) DEFAULT NULL COMMENT '第三方登录 - 神牛教APPID',
  `oauth_bd_client_secret` varchar(128) DEFAULT NULL COMMENT '第三方登录 - 百度秘钥',
  `oauth_bd_client_id` varchar(64) DEFAULT NULL COMMENT '第三方登录 - 百度APPID',
  `oauth_git_client_secret` varchar(128) DEFAULT NULL COMMENT '第三方登录 - Github秘钥',
  `oauth_git_client_id` varchar(64) DEFAULT NULL COMMENT '第三方登录 - Github APPID',
  `oauth_wb_client_secret` varchar(128) DEFAULT NULL COMMENT '第三方登录 - 微博秘钥',
  `oauth_wb_client_id` varchar(64) DEFAULT NULL COMMENT '第三方登录 - 微博 APPID',
  `warning_email` varchar(255) DEFAULT NULL COMMENT '接收警报的邮箱',
  `warning_value` varchar(30) DEFAULT NULL COMMENT '警报触发峰值',
  `warning_type` tinyint(1) DEFAULT NULL COMMENT '峰值类型',
  `warning_num` varchar(255) DEFAULT '0' COMMENT '第N次触发峰值',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COMMENT='全站配置表';

-- ----------------------------
-- Records of jun_config
-- ----------------------------
INSERT INTO `jun_config` VALUES ('1', '0', '', '', '', '', '', 'ssl://smtp.163.com', 'UTF-8', '465', '', '', '', '', '2.0M', 'jpeg,jpg,png,gif', '1', '0', '', '', '', '', '0', '', '', '', '', '', '{}', '6600', '2', '0', '0', '', '', '', '', '0.0.0.0', '0', '1', '', '', '0', 'https://', '', '', '', '', '', '', '', '', '500', '1', '0');

-- ----------------------------
-- Table structure for jun_demo_benner
-- ----------------------------
DROP TABLE IF EXISTS `jun_demo_benner`;
CREATE TABLE `jun_demo_benner` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `columnpid` varchar(15) NOT NULL COMMENT '栏目id',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态 0|1 禁用|启用',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  `title` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `href` varchar(255) DEFAULT NULL,
  `sort` decimal(11,0) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COMMENT='轮播图模型表';

-- ----------------------------
-- Records of jun_demo_benner
-- ----------------------------
INSERT INTO `jun_demo_benner` VALUES ('1', '5c9995f0eb7a0', '1', '2019-03-26 11:01:58', '苹果不再“硬扛”，开始“服软”', '/public/edit/20190326/5d83ae26a3a87461c3feb11b3355b3d4.jpg', '', '0');
INSERT INTO `jun_demo_benner` VALUES ('2', '5c9995f0eb7a0', '1', '2019-03-26 11:02:23', '焦点分析 | 老字号车企+阿里腾讯+苏宁=打败滴滴？', '/public/edit/20190326/aba801ebe19d14cddd102f84041c7f03.jpg', '', '0');

-- ----------------------------
-- Table structure for jun_demo_news
-- ----------------------------
DROP TABLE IF EXISTS `jun_demo_news`;
CREATE TABLE `jun_demo_news` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `columnpid` varchar(15) NOT NULL COMMENT '栏目id',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态 0|1 禁用|启用',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  `title` varchar(255) DEFAULT NULL,
  `des` text,
  `thumbnail` varchar(255) DEFAULT NULL,
  `tags` varchar(255) DEFAULT NULL,
  `praise` decimal(11,0) DEFAULT NULL,
  `love` decimal(11,0) DEFAULT NULL,
  `comment` decimal(11,0) DEFAULT NULL,
  `author` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='文章模型表';

-- ----------------------------
-- Records of jun_demo_news
-- ----------------------------
INSERT INTO `jun_demo_news` VALUES ('1', '5c9991de4c180', '1', '2019-03-26 10:46:07', '谷歌聘请Soundstage的开发人员，全景声和VR之间还能有多少新的创意？', '谷歌聘请Soundstage的开发人员，全景声和VR之间还能有多少新的创意？', '/public/edit/20190326/6b9b1eabfb9ace107f5464bbf7f0e02f.jpg', '2,3', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('2', '5c9991de4c180', '1', '2019-03-26 10:46:38', '苹果大战 Spotify，就像当年乔布斯大战索尼', '苹果大战 Spotify，就像当年乔布斯大战索尼', '/public/edit/20190326/420394198e50f4d4b18dfbc0c9fabdf9.jpg', '2', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('3', '5c9992b5333fe', '1', '2019-03-26 10:51:03', '宝马，英特尔与新加坡政府支持的区块链项目达成合作', '英特尔公司将为Tribe 提供业务和技术指导。', '/public/edit/20190326/3e1f715bb3af868fa9b5b0849d388bf9.jpg', '1', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('4', '5c9992b5333fe', '1', '2019-03-26 10:54:01', '苹果大战 Spotify，就像当年乔布斯大战索尼', '这场诉讼，对苹果可能是一个考验，而它的背后，是流媒体音乐竞争的必然结果。', '/public/edit/20190326/09f67659efda9aa1cfae18768af851c1.jpg', '2,3', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('5', '5c9992b5333fe', '1', '2019-03-26 10:54:48', '资本眼里的腾讯：支付不稳，游戏真香', '腾讯的底层逻辑就是双轮驱动，一边是微信和QQ社交流量的跨边界输出，一边是游戏提供的金钱支持。', '/public/edit/20190326/8f657dac1d39e354cb2adde2e8d952da.jpg', '2', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('6', '5c9991de4c180', '1', '2019-03-26 10:46:07', '谷歌聘请Soundstage的开发人员，全景声和VR之间还能有多少新的创意？', '谷歌聘请Soundstage的开发人员，全景声和VR之间还能有多少新的创意？', '/public/edit/20190326/6b9b1eabfb9ace107f5464bbf7f0e02f.jpg', '2,3', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('7', '5c9992b5333fe', '1', '2019-03-26 10:54:48', '资本眼里的腾讯：支付不稳，游戏真香', '腾讯的底层逻辑就是双轮驱动，一边是微信和QQ社交流量的跨边界输出，一边是游戏提供的金钱支持。', '/public/edit/20190326/8f657dac1d39e354cb2adde2e8d952da.jpg', '2', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('8', '5c9992b5333fe', '1', '2019-03-26 10:57:00', '”长不大”的丁磊，长不大的网易', '致郁系动漫《马男波杰克》中有这样一段台词，说“成名之后，人就不会成长了，因为没有必要。每个人都有冻龄点，而冻龄点，就是你停止成长的那一刻。”', '/public/edit/20190326/4c51ac15f9d309da094e6219c2e9d5db.jpg', '2', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('9', '5c9992b5333fe', '1', '2019-03-26 10:58:18', '开发商拼命挤进大湾区，前十囤地1.8亿平方米', '这次集中在年报季的秀肌肉潮流或许只是一个开始。', '/public/edit/20190326/b6cf56eeed2a2171fbffc969a0f134c7.jpg', '2', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('10', '5c9992b5333fe', '1', '2019-03-26 10:58:59', '腾讯、头条、百度的用户注意力争夺战：谁霸占了你的手机？', '针对腾讯、字节跳动和百度旗下应用矩阵的用户使用时长表现发起了市场洞察分析。', '/public/edit/20190326/d36fc741986b9177d174abe9b57a5993.jpg', '2,3', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('11', '5c9992b5333fe', '1', '2019-03-26 10:59:00', '腾讯、头条、百度的用户注意力争夺战：谁霸占了你的手机？', '针对腾讯、字节跳动和百度旗下应用矩阵的用户使用时长表现发起了市场洞察分析。', '/public/edit/20190326/d36fc741986b9177d174abe9b57a5993.jpg', '2,3', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('12', '5c9992b5333fe', '1', '2019-03-26 10:59:00', '腾讯、头条、百度的用户注意力争夺战：谁霸占了你的手机？', '针对腾讯、字节跳动和百度旗下应用矩阵的用户使用时长表现发起了市场洞察分析。', '/public/edit/20190326/d36fc741986b9177d174abe9b57a5993.jpg', '2,3', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('13', '5c9992b5333fe', '1', '2019-03-26 10:59:00', '腾讯、头条、百度的用户注意力争夺战：谁霸占了你的手机？', '针对腾讯、字节跳动和百度旗下应用矩阵的用户使用时长表现发起了市场洞察分析。', '/public/edit/20190326/d36fc741986b9177d174abe9b57a5993.jpg', '2,3', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('14', '5c9992b5333fe', '1', '2019-03-26 10:59:50', '美证交会称马斯克违背和解协议，必须承担法律责任', '有法律界人士称，马斯克可能会面临更严重的惩罚。除了董事职务外，马斯克甚至被迫辞去首席执行官职务。', '/public/edit/20190326/760dd89734ec7ae9f0d4b3f818a49576.jpg', '2', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('15', '5c9992b5333fe', '1', '2019-03-26 10:59:50', '美证交会称马斯克违背和解协议，必须承担法律责任', '有法律界人士称，马斯克可能会面临更严重的惩罚。除了董事职务外，马斯克甚至被迫辞去首席执行官职务。', '/public/edit/20190326/760dd89734ec7ae9f0d4b3f818a49576.jpg', '2', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('16', '5c9992b5333fe', '1', '2019-03-26 10:59:51', '美证交会称马斯克违背和解协议，必须承担法律责任', '有法律界人士称，马斯克可能会面临更严重的惩罚。除了董事职务外，马斯克甚至被迫辞去首席执行官职务。', '/public/edit/20190326/760dd89734ec7ae9f0d4b3f818a49576.jpg', '2', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('17', '5c9992b5333fe', '1', '2019-03-26 10:59:51', '美证交会称马斯克违背和解协议，必须承担法律责任', '有法律界人士称，马斯克可能会面临更严重的惩罚。除了董事职务外，马斯克甚至被迫辞去首席执行官职务。', '/public/edit/20190326/760dd89734ec7ae9f0d4b3f818a49576.jpg', '2', '0', '0', '0', 'JunAMS');
INSERT INTO `jun_demo_news` VALUES ('18', '5c9992b5333fe', '1', '2019-03-26 10:59:51', '美证交会称马斯克违背和解协议，必须承担法律责任', '有法律界人士称，马斯克可能会面临更严重的惩罚。除了董事职务外，马斯克甚至被迫辞去首席执行官职务。', '/public/edit/20190326/760dd89734ec7ae9f0d4b3f818a49576.jpg', '2', '0', '0', '0', 'JunAMS');

-- ----------------------------
-- Table structure for jun_demo_news_data
-- ----------------------------
DROP TABLE IF EXISTS `jun_demo_news_data`;
CREATE TABLE `jun_demo_news_data` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pid` int(10) unsigned NOT NULL COMMENT '主表id',
  `content` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='文章模型附属表';

-- ----------------------------
-- Records of jun_demo_news_data
-- ----------------------------
INSERT INTO `jun_demo_news_data` VALUES ('1', '1', '今日，谷歌方面对外公布关于Logan Olson的招聘信息，谷歌发言人通过电子邮件在给UploadVR的官方声明中表示，他们非常高兴能够邀请到Logan加入谷歌的VR团队，并表示他们受到了Logan开发的Soundstage在创意及内容方面与VR结合的启发。 Logan Olson作为自由开发者设计经营了Soundstage这款VR应用，通过HTC Vive以VR设备给音乐人提供虚拟音乐工作室，用于演奏、录音、并可进行混音录制。 \n\nSoundStage之前将通过Steam平台的\"抢先体验（Early Access）\"发布，它创造了一个虚拟空间，通过VR技术为用户提供三种演示模式：节奏、合成器和音序器范例，每一款范例都提供了一种预编程的声音样本，可在其中修改、添加新音轨，也可以一并抹去。用户可通过Vive控制器可以调选8种不同的声音创造工具菜单，包括键盘、音序器、沙球、特雷门电子琴、录音带（样本库）、混合器（4通道）和鼓等，并可以通过工具上的虚拟插孔控制器进行任意组合。此前中国地区程序售价为36元。 Olson的举动表明，Soundstage上的积极开发已经基本完成，不用再有更多大范围的更新，该项目也将延续现今模式继续发展。但目前并不清楚Olson是否会在谷歌展开基于VR体验的音乐项目。但是，谷歌通过Tilt BRush进行了展示并且重申了会继续实现创意和VR的结合。 \n\n谷歌曾于2016年7月发布开源项目Omnitone，该项目的目的是实现普通耳机在VR环境中的3D全景音效，让用户获得更好的VR沉浸感，并公布了技术原理图。目前谷歌的VR项目包括了，Cardboard、Daydream和WebVR。 谷歌聘请Soundstage的开发人员，全景声和VR之间还能有多少新的创意？ 开源有助于吸引自由开发者在平台上开发更多好的项目和创意，但挖走这些自由开发者无疑是更高效的方式。Olson自2008年以来一直专注于沉溺式娱乐方式的体验设计师，此前还和Mark Bolas一起建立房间尺度的VR场景，然后转移到主题公园和互动玩具上。 全景声结合VR能够给人以更好的体验这是毋庸置疑的，而伴随谷歌在算法和技术的完善，未来似乎能够降低C端普通用户学习、体验音乐的成本，也能够为专业C端用户，如编曲、音乐制作人提供更多技术支持和展示机会的创新。 设想一下，也许未来大家再也不用买票去现场挤演唱会了，用户能够在家里就听到和看到真实的现场演唱会，或是数字化的电子演唱会；歌剧戏剧等容易受场景限制的表演形式，也能够通过此类设降低一定的体验门槛。\n\n![](http://tim.junphp.com/public/edit/20190326/6b9b1eabfb9ace107f5464bbf7f0e02f.jpg)\n\n或是乐器的教学也可以直接通过VR远程实现。');
INSERT INTO `jun_demo_news_data` VALUES ('2', '2', '今日，谷歌方面对外公布关于Logan Olson的招聘信息，谷歌发言人通过电子邮件在给UploadVR的官方声明中表示，他们非常高兴能够邀请到Logan加入谷歌的VR团队，并表示他们受到了Logan开发的Soundstage在创意及内容方面与VR结合的启发。 Logan Olson作为自由开发者设计经营了Soundstage这款VR应用，通过HTC Vive以VR设备给音乐人提供虚拟音乐工作室，用于演奏、录音、并可进行混音录制。 \n\nSoundStage之前将通过Steam平台的\"抢先体验（Early Access）\"发布，它创造了一个虚拟空间，通过VR技术为用户提供三种演示模式：节奏、合成器和音序器范例，每一款范例都提供了一种预编程的声音样本，可在其中修改、添加新音轨，也可以一并抹去。用户可通过Vive控制器可以调选8种不同的声音创造工具菜单，包括键盘、音序器、沙球、特雷门电子琴、录音带（样本库）、混合器（4通道）和鼓等，并可以通过工具上的虚拟插孔控制器进行任意组合。此前中国地区程序售价为36元。 Olson的举动表明，Soundstage上的积极开发已经基本完成，不用再有更多大范围的更新，该项目也将延续现今模式继续发展。但目前并不清楚Olson是否会在谷歌展开基于VR体验的音乐项目。但是，谷歌通过Tilt BRush进行了展示并且重申了会继续实现创意和VR的结合。 \n\n谷歌曾于2016年7月发布开源项目Omnitone，该项目的目的是实现普通耳机在VR环境中的3D全景音效，让用户获得更好的VR沉浸感，并公布了技术原理图。目前谷歌的VR项目包括了，Cardboard、Daydream和WebVR。 谷歌聘请Soundstage的开发人员，全景声和VR之间还能有多少新的创意？ 开源有助于吸引自由开发者在平台上开发更多好的项目和创意，但挖走这些自由开发者无疑是更高效的方式。Olson自2008年以来一直专注于沉溺式娱乐方式的体验设计师，此前还和Mark Bolas一起建立房间尺度的VR场景，然后转移到主题公园和互动玩具上。 全景声结合VR能够给人以更好的体验这是毋庸置疑的，而伴随谷歌在算法和技术的完善，未来似乎能够降低C端普通用户学习、体验音乐的成本，也能够为专业C端用户，如编曲、音乐制作人提供更多技术支持和展示机会的创新。 设想一下，也许未来大家再也不用买票去现场挤演唱会了，用户能够在家里就听到和看到真实的现场演唱会，或是数字化的电子演唱会；歌剧戏剧等容易受场景限制的表演形式，也能够通过此类设降低一定的体验门槛。\n\n![](http://tim.junphp.com/public/edit/20190326/6b9b1eabfb9ace107f5464bbf7f0e02f.jpg)\n\n或是乐器的教学也可以直接通过VR远程实现。');
INSERT INTO `jun_demo_news_data` VALUES ('3', '3', '![](http://tim.junphp.com/public/edit/20190326/3e1f715bb3af868fa9b5b0849d388bf9.jpg)\n\n据 Coindesk 近日报道，宝马集团（亚洲），英特尔和尼尔森共同宣布与新加坡政府支持的区块链孵化器项目 Tribe 达成了合作。\n\n据介绍，Tribe 是新加坡政府支持的区块链孵化器项目，为新加坡的东南亚风险投资公司 Trive Ventures 的一部分。据了解，去年 12 月，Tribe 曾宣布与普华永道（PwC）新加坡风险投资中心和韩国区块链网络 Icon Foundation 展开合作。上个月，Tribe 还与 ConsenSys 合作，以进一步推动新加坡的区块链生态系统。\n\nTribe 称宝马集团（亚洲），英特尔和尼尔森将与 Tribe 分享他们在各自领域的专业知识，为共同建立 “工业 4.0” 做准备。\n\nOdaily 星球日报注：“工业 4.0”的概念在 2013 年被德国政府正式提出之后，“智能化”随即成为引领第四代工业革命的主题。\n\n宝马集团（亚洲）将提供关于区块链解决方案如何在大众市场中实施的指导意见。\n\n“我们希望我们可以帮助这些区块链初创公司去创新他们的区块链概念，推动区块链技术在人们现实生活场景的落地。”宝马集团亚洲区副总裁兼亚太地区负责人 Carsten Sapia 说。\n\n其实宝马此前还与多家区块链初创公司合作，2018 年初，宝马集团与位于伦敦的区块链初创公司 Circulor 合作，以确保其电动汽车电池所使用的稀有金属钴的来源达标。2018 年 3 月，宝马与区块链公司 VeChain 合作，追踪汽车修理历史和驾驶行为。VeChain 是一家区块链供应链管理及加密货币公司，主要提供供应链管理领域解决方案，帮助进行产品质量追踪及真实性管理服务。\n\n另一方面，英特尔公司将为 Tribe 提供业务和技术指导。“英特尔 Xeon 可扩展处理器和英特尔 SGX 等技术可以帮助提高区块链解决方案的隐私性，安全性和可扩展性，”英特尔区块链项目总监 Michael Reed 表示。\n\n据 Cointelegraph 报道，英特尔 2019 年年初已经推出了基于 Hyperledger 生态系统的商用区块链软件包。');
INSERT INTO `jun_demo_news_data` VALUES ('4', '4', '![](http://tim.junphp.com/public/edit/20190326/09f67659efda9aa1cfae18768af851c1.jpg)\n\n苹果很快就做了个回复，核心有两点，第一，苹果没有限制 Spotify 的 app；第二，对数字商品和服务抽成 30%，是 App Store 一开始就订下的规则，对所有 app 一视同仁。\n\n垄断者都是这样，从来不觉得自己做错了。\n\nSpotify 丢下这句对苹果的回应的回应后，双方的口水仗暂时告一段落。\n这场「掐架」似乎来得有点莫名其妙。\n\n就像苹果说的，Apple Watch 的音乐分类下，Spotify 现在排名第一；而应用内购买抽成一直都是 App Store 的商业模式，对于订阅类的服务，第一年 30% 的抽成之后，后续的抽成比例还会降到 15%。\n\n软件行业是典型的高投入高回报的产业，在达到一定的用户规模之后，它的边际成本（复制、分发 app）会趋近于零，所以，它们能承受 30% 的抽成比例，苹果优秀的体验也促进了 app 的发展，双方一起推动了 app 生态的繁荣。');
INSERT INTO `jun_demo_news_data` VALUES ('5', '5', '![](/public/edit/20190326/90e4e49a7b4b784d4af54311c2808457.jpg)\n\n3月21日那份财报发布前，腾讯已经对可能的争议有了心理预警，但背后的不确定性在于，港股并非恰当反映中国互联网公司价值的最佳平台，权重股既要拿出真金白银的业绩，还要画出好看、好吃的大饼，典型的在平衡木上跳舞。\n\n过去腾讯尝试了流量+资本的投行模式，拼命填充场景建立壁垒，拓展边界，但也引起“没有梦想”的指责，于是去年反躬自省进行了号称是“做6年规划，应对20年趋势”的架构大调整，强调内容先行、能力支持、技术驱动。\n\n但完成这个生态迭代，腾讯不仅需要手游和端游创造现金流和利润，还需要金融科技、云服务和影视制作组成的“其他收入”作为清洁能源，尤其是后者去年取得了同比72%的高增长，贡献了242.12亿元的收入。\n\n其中移动支付的数据很令人振奋，2016年财付通日均交易笔数超过6亿，去年突破10亿，商业支付的比例首次超过50%，在体系内部被寄予厚望。\n\n不过，这也可能是一种虚假繁荣。');
INSERT INTO `jun_demo_news_data` VALUES ('6', '6', '今日，谷歌方面对外公布关于Logan Olson的招聘信息，谷歌发言人通过电子邮件在给UploadVR的官方声明中表示，他们非常高兴能够邀请到Logan加入谷歌的VR团队，并表示他们受到了Logan开发的Soundstage在创意及内容方面与VR结合的启发。 Logan Olson作为自由开发者设计经营了Soundstage这款VR应用，通过HTC Vive以VR设备给音乐人提供虚拟音乐工作室，用于演奏、录音、并可进行混音录制。 \n\nSoundStage之前将通过Steam平台的\"抢先体验（Early Access）\"发布，它创造了一个虚拟空间，通过VR技术为用户提供三种演示模式：节奏、合成器和音序器范例，每一款范例都提供了一种预编程的声音样本，可在其中修改、添加新音轨，也可以一并抹去。用户可通过Vive控制器可以调选8种不同的声音创造工具菜单，包括键盘、音序器、沙球、特雷门电子琴、录音带（样本库）、混合器（4通道）和鼓等，并可以通过工具上的虚拟插孔控制器进行任意组合。此前中国地区程序售价为36元。 Olson的举动表明，Soundstage上的积极开发已经基本完成，不用再有更多大范围的更新，该项目也将延续现今模式继续发展。但目前并不清楚Olson是否会在谷歌展开基于VR体验的音乐项目。但是，谷歌通过Tilt BRush进行了展示并且重申了会继续实现创意和VR的结合。 \n\n谷歌曾于2016年7月发布开源项目Omnitone，该项目的目的是实现普通耳机在VR环境中的3D全景音效，让用户获得更好的VR沉浸感，并公布了技术原理图。目前谷歌的VR项目包括了，Cardboard、Daydream和WebVR。 谷歌聘请Soundstage的开发人员，全景声和VR之间还能有多少新的创意？ 开源有助于吸引自由开发者在平台上开发更多好的项目和创意，但挖走这些自由开发者无疑是更高效的方式。Olson自2008年以来一直专注于沉溺式娱乐方式的体验设计师，此前还和Mark Bolas一起建立房间尺度的VR场景，然后转移到主题公园和互动玩具上。 全景声结合VR能够给人以更好的体验这是毋庸置疑的，而伴随谷歌在算法和技术的完善，未来似乎能够降低C端普通用户学习、体验音乐的成本，也能够为专业C端用户，如编曲、音乐制作人提供更多技术支持和展示机会的创新。 设想一下，也许未来大家再也不用买票去现场挤演唱会了，用户能够在家里就听到和看到真实的现场演唱会，或是数字化的电子演唱会；歌剧戏剧等容易受场景限制的表演形式，也能够通过此类设降低一定的体验门槛。\n\n![](http://tim.junphp.com/public/edit/20190326/6b9b1eabfb9ace107f5464bbf7f0e02f.jpg)\n\n或是乐器的教学也可以直接通过VR远程实现。');
INSERT INTO `jun_demo_news_data` VALUES ('7', '7', '![](/public/edit/20190326/90e4e49a7b4b784d4af54311c2808457.jpg)\n\n3月21日那份财报发布前，腾讯已经对可能的争议有了心理预警，但背后的不确定性在于，港股并非恰当反映中国互联网公司价值的最佳平台，权重股既要拿出真金白银的业绩，还要画出好看、好吃的大饼，典型的在平衡木上跳舞。\n\n过去腾讯尝试了流量+资本的投行模式，拼命填充场景建立壁垒，拓展边界，但也引起“没有梦想”的指责，于是去年反躬自省进行了号称是“做6年规划，应对20年趋势”的架构大调整，强调内容先行、能力支持、技术驱动。\n\n但完成这个生态迭代，腾讯不仅需要手游和端游创造现金流和利润，还需要金融科技、云服务和影视制作组成的“其他收入”作为清洁能源，尤其是后者去年取得了同比72%的高增长，贡献了242.12亿元的收入。\n\n其中移动支付的数据很令人振奋，2016年财付通日均交易笔数超过6亿，去年突破10亿，商业支付的比例首次超过50%，在体系内部被寄予厚望。\n\n不过，这也可能是一种虚假繁荣。');
INSERT INTO `jun_demo_news_data` VALUES ('8', '8', '![](http://tim.junphp.com/public/edit/20190326/4c51ac15f9d309da094e6219c2e9d5db.jpg)\n\n此外还有很多例子，可以说明他内心对“肮脏”的厌恶。\n\n《人物》采访中曾提到这样几个事。\n\n在一次私人聚会上，丁磊谈起微信里的某一项功能，评价这是一个毫无道德的设计，好比“五星级酒店楼下开的妓院”，“你让小孩子怎么使用？”他把手机摔在桌上，生气地问。\n\n他还曾愤怒地把一张暴露的美女照片打印出来，贴在门户频道一位主编的墙上。“如果谁再上这种图片，我就把照片打印出来寄给他父母！”\n\n此外，还有对改进工作环境的兴致勃勃。\n\n“我们这食堂一层就有800个位置，师傅都是自己请的，饭随便吃”。\n\n“我们这地下停车场600多个车位，没有号码，随便停。”\n\n“我们这班车不收钱。”');
INSERT INTO `jun_demo_news_data` VALUES ('9', '9', '大湾区所涵盖的广州、深圳、佛山等城市恰好是众多老牌房企的发源地。最开始，他们就是以大湾区为原点，开启了全国化扩张。如今政策的东风飘到了大本营，他们自然也不甘在这个风口落下。\n\n碧桂园一直被认为是粤港澳大湾区土地储备最为生猛的房企。根据碧桂园公布的2018年年报数据，其位于粤港澳大湾区的权益可售货源达 3721.2 亿元，可售建筑面积约为 2544.5 万平方米。另湾区内还有潜在可售货源约 5554 亿元，与已获取的权益可售货源合计 9275 亿元。\n\n从碧桂园公布的数据来看，仅惠州和广州两地就为其提供了超过 53% 的权益可售资源。碧桂园也频繁在广州、佛山、肇庆等地加仓。2018 年，碧桂园仅在佛山就拿到 6 块地，总面积超过 50 万平方米，楼面价每平米只有 4753 元。\n\n![](http://tim.junphp.com/public/edit/20190326/b6cf56eeed2a2171fbffc969a0f134c7.jpg)');
INSERT INTO `jun_demo_news_data` VALUES ('10', '10', '![](http://tim.junphp.com/public/edit/20190326/d36fc741986b9177d174abe9b57a5993.jpg)\n\n\n根据极光大数据的统计结果，过去一年腾讯系应用在用户使用时长占比上呈现持续下降趋势。截至2018年12月，腾讯系应用的用户使用时长占比为45.3%，较2017年同期下降9.8%。\n\n字节跳动旗下应用在用户使用时长上的占比却呈现持续上升趋势。截至2018年12月，字节跳动公司旗下应用的用户使用时长占比为13.2%，较2017年同期增长7.3%。\n\n在2018年度，百度系应用在用户时长占比上的表现相对稳定。截至2018年12月，百度系应用的用户时长占比为3.6%，与2017年同期基本持平。');
INSERT INTO `jun_demo_news_data` VALUES ('11', '11', '![](http://tim.junphp.com/public/edit/20190326/d36fc741986b9177d174abe9b57a5993.jpg)\n\n\n根据极光大数据的统计结果，过去一年腾讯系应用在用户使用时长占比上呈现持续下降趋势。截至2018年12月，腾讯系应用的用户使用时长占比为45.3%，较2017年同期下降9.8%。\n\n字节跳动旗下应用在用户使用时长上的占比却呈现持续上升趋势。截至2018年12月，字节跳动公司旗下应用的用户使用时长占比为13.2%，较2017年同期增长7.3%。\n\n在2018年度，百度系应用在用户时长占比上的表现相对稳定。截至2018年12月，百度系应用的用户时长占比为3.6%，与2017年同期基本持平。');
INSERT INTO `jun_demo_news_data` VALUES ('12', '12', '![](http://tim.junphp.com/public/edit/20190326/d36fc741986b9177d174abe9b57a5993.jpg)\n\n\n根据极光大数据的统计结果，过去一年腾讯系应用在用户使用时长占比上呈现持续下降趋势。截至2018年12月，腾讯系应用的用户使用时长占比为45.3%，较2017年同期下降9.8%。\n\n字节跳动旗下应用在用户使用时长上的占比却呈现持续上升趋势。截至2018年12月，字节跳动公司旗下应用的用户使用时长占比为13.2%，较2017年同期增长7.3%。\n\n在2018年度，百度系应用在用户时长占比上的表现相对稳定。截至2018年12月，百度系应用的用户时长占比为3.6%，与2017年同期基本持平。');
INSERT INTO `jun_demo_news_data` VALUES ('13', '13', '![](http://tim.junphp.com/public/edit/20190326/d36fc741986b9177d174abe9b57a5993.jpg)\n\n\n根据极光大数据的统计结果，过去一年腾讯系应用在用户使用时长占比上呈现持续下降趋势。截至2018年12月，腾讯系应用的用户使用时长占比为45.3%，较2017年同期下降9.8%。\n\n字节跳动旗下应用在用户使用时长上的占比却呈现持续上升趋势。截至2018年12月，字节跳动公司旗下应用的用户使用时长占比为13.2%，较2017年同期增长7.3%。\n\n在2018年度，百度系应用在用户时长占比上的表现相对稳定。截至2018年12月，百度系应用的用户时长占比为3.6%，与2017年同期基本持平。');
INSERT INTO `jun_demo_news_data` VALUES ('14', '14', '近日，特斯拉首席执行官埃隆·马斯克和美国证券交易委员会之间产生了新的法律纠纷，证交会指控马斯克后来在推特上继续发布重大公司信息，违反了之前和证交会签署的和解协议，属于藐视法庭行为，必须承担法律责任。\n\n随后，马斯克的律师通过法庭文件回应称，引发美国证券交易委员会不满的马斯克相关帖子，内容适当，也不算有关特斯拉经营的重要实质性信息。\n\n《证券日报》记者了解到，在上周提交给纽约曼哈顿联邦法院的一份文件中，马斯克的律师还表示，他们的客户（马斯克）“尊重”他对这家电动车公司、其股东和法院的所有义务。\n\n今年2月19日，马斯克在推特网站发帖，向2400多万关注他账号的粉丝称，特斯拉公司今年将生产五十万辆电动车。随后美国证交会认为，此言论属于涉及特斯拉投资人和股东利益的重要披露信息，马斯克发布之前必须获得特斯拉内部的批准。\n\n对于证交会向马斯克提出的藐视法庭的新指控，有法律界人士称，马斯克可能会面临更严重的惩罚。除了董事职务外，马斯克甚至被迫辞去首席执行官职务。\n\n事实上，早在去年8月份，马斯克在推特闹出了“私有化收购”风波。彼时，马斯克突然发帖宣布，将会对特斯拉展开私有化收购，每股收购价为420美元，另外他已经获得了收购所需的资金。此言论一出震惊了舆论，外界普遍认为马斯克违反了美国证券法律和上市公司信息披露规定。最终，其仓促提出的私有化收购也未能变成现实。\n\n美国证券交易委员会对马斯克上述帖子发起了证券欺诈的指控，批评他违反了有关信息披露的美国证券法。最终，马斯克和证交会签署了和解协议，他不仅与公司被分别处于2000万美元的罚款，本人也不得不辞去董事长职务。');
INSERT INTO `jun_demo_news_data` VALUES ('15', '15', '近日，特斯拉首席执行官埃隆·马斯克和美国证券交易委员会之间产生了新的法律纠纷，证交会指控马斯克后来在推特上继续发布重大公司信息，违反了之前和证交会签署的和解协议，属于藐视法庭行为，必须承担法律责任。\n\n随后，马斯克的律师通过法庭文件回应称，引发美国证券交易委员会不满的马斯克相关帖子，内容适当，也不算有关特斯拉经营的重要实质性信息。\n\n《证券日报》记者了解到，在上周提交给纽约曼哈顿联邦法院的一份文件中，马斯克的律师还表示，他们的客户（马斯克）“尊重”他对这家电动车公司、其股东和法院的所有义务。\n\n今年2月19日，马斯克在推特网站发帖，向2400多万关注他账号的粉丝称，特斯拉公司今年将生产五十万辆电动车。随后美国证交会认为，此言论属于涉及特斯拉投资人和股东利益的重要披露信息，马斯克发布之前必须获得特斯拉内部的批准。\n\n对于证交会向马斯克提出的藐视法庭的新指控，有法律界人士称，马斯克可能会面临更严重的惩罚。除了董事职务外，马斯克甚至被迫辞去首席执行官职务。\n\n事实上，早在去年8月份，马斯克在推特闹出了“私有化收购”风波。彼时，马斯克突然发帖宣布，将会对特斯拉展开私有化收购，每股收购价为420美元，另外他已经获得了收购所需的资金。此言论一出震惊了舆论，外界普遍认为马斯克违反了美国证券法律和上市公司信息披露规定。最终，其仓促提出的私有化收购也未能变成现实。\n\n美国证券交易委员会对马斯克上述帖子发起了证券欺诈的指控，批评他违反了有关信息披露的美国证券法。最终，马斯克和证交会签署了和解协议，他不仅与公司被分别处于2000万美元的罚款，本人也不得不辞去董事长职务。');
INSERT INTO `jun_demo_news_data` VALUES ('16', '16', '近日，特斯拉首席执行官埃隆·马斯克和美国证券交易委员会之间产生了新的法律纠纷，证交会指控马斯克后来在推特上继续发布重大公司信息，违反了之前和证交会签署的和解协议，属于藐视法庭行为，必须承担法律责任。\n\n随后，马斯克的律师通过法庭文件回应称，引发美国证券交易委员会不满的马斯克相关帖子，内容适当，也不算有关特斯拉经营的重要实质性信息。\n\n《证券日报》记者了解到，在上周提交给纽约曼哈顿联邦法院的一份文件中，马斯克的律师还表示，他们的客户（马斯克）“尊重”他对这家电动车公司、其股东和法院的所有义务。\n\n今年2月19日，马斯克在推特网站发帖，向2400多万关注他账号的粉丝称，特斯拉公司今年将生产五十万辆电动车。随后美国证交会认为，此言论属于涉及特斯拉投资人和股东利益的重要披露信息，马斯克发布之前必须获得特斯拉内部的批准。\n\n对于证交会向马斯克提出的藐视法庭的新指控，有法律界人士称，马斯克可能会面临更严重的惩罚。除了董事职务外，马斯克甚至被迫辞去首席执行官职务。\n\n事实上，早在去年8月份，马斯克在推特闹出了“私有化收购”风波。彼时，马斯克突然发帖宣布，将会对特斯拉展开私有化收购，每股收购价为420美元，另外他已经获得了收购所需的资金。此言论一出震惊了舆论，外界普遍认为马斯克违反了美国证券法律和上市公司信息披露规定。最终，其仓促提出的私有化收购也未能变成现实。\n\n美国证券交易委员会对马斯克上述帖子发起了证券欺诈的指控，批评他违反了有关信息披露的美国证券法。最终，马斯克和证交会签署了和解协议，他不仅与公司被分别处于2000万美元的罚款，本人也不得不辞去董事长职务。');
INSERT INTO `jun_demo_news_data` VALUES ('17', '17', '近日，特斯拉首席执行官埃隆·马斯克和美国证券交易委员会之间产生了新的法律纠纷，证交会指控马斯克后来在推特上继续发布重大公司信息，违反了之前和证交会签署的和解协议，属于藐视法庭行为，必须承担法律责任。\n\n随后，马斯克的律师通过法庭文件回应称，引发美国证券交易委员会不满的马斯克相关帖子，内容适当，也不算有关特斯拉经营的重要实质性信息。\n\n《证券日报》记者了解到，在上周提交给纽约曼哈顿联邦法院的一份文件中，马斯克的律师还表示，他们的客户（马斯克）“尊重”他对这家电动车公司、其股东和法院的所有义务。\n\n今年2月19日，马斯克在推特网站发帖，向2400多万关注他账号的粉丝称，特斯拉公司今年将生产五十万辆电动车。随后美国证交会认为，此言论属于涉及特斯拉投资人和股东利益的重要披露信息，马斯克发布之前必须获得特斯拉内部的批准。\n\n对于证交会向马斯克提出的藐视法庭的新指控，有法律界人士称，马斯克可能会面临更严重的惩罚。除了董事职务外，马斯克甚至被迫辞去首席执行官职务。\n\n事实上，早在去年8月份，马斯克在推特闹出了“私有化收购”风波。彼时，马斯克突然发帖宣布，将会对特斯拉展开私有化收购，每股收购价为420美元，另外他已经获得了收购所需的资金。此言论一出震惊了舆论，外界普遍认为马斯克违反了美国证券法律和上市公司信息披露规定。最终，其仓促提出的私有化收购也未能变成现实。\n\n美国证券交易委员会对马斯克上述帖子发起了证券欺诈的指控，批评他违反了有关信息披露的美国证券法。最终，马斯克和证交会签署了和解协议，他不仅与公司被分别处于2000万美元的罚款，本人也不得不辞去董事长职务。');
INSERT INTO `jun_demo_news_data` VALUES ('18', '18', '近日，特斯拉首席执行官埃隆·马斯克和美国证券交易委员会之间产生了新的法律纠纷，证交会指控马斯克后来在推特上继续发布重大公司信息，违反了之前和证交会签署的和解协议，属于藐视法庭行为，必须承担法律责任。\n\n随后，马斯克的律师通过法庭文件回应称，引发美国证券交易委员会不满的马斯克相关帖子，内容适当，也不算有关特斯拉经营的重要实质性信息。\n\n《证券日报》记者了解到，在上周提交给纽约曼哈顿联邦法院的一份文件中，马斯克的律师还表示，他们的客户（马斯克）“尊重”他对这家电动车公司、其股东和法院的所有义务。\n\n今年2月19日，马斯克在推特网站发帖，向2400多万关注他账号的粉丝称，特斯拉公司今年将生产五十万辆电动车。随后美国证交会认为，此言论属于涉及特斯拉投资人和股东利益的重要披露信息，马斯克发布之前必须获得特斯拉内部的批准。\n\n对于证交会向马斯克提出的藐视法庭的新指控，有法律界人士称，马斯克可能会面临更严重的惩罚。除了董事职务外，马斯克甚至被迫辞去首席执行官职务。\n\n事实上，早在去年8月份，马斯克在推特闹出了“私有化收购”风波。彼时，马斯克突然发帖宣布，将会对特斯拉展开私有化收购，每股收购价为420美元，另外他已经获得了收购所需的资金。此言论一出震惊了舆论，外界普遍认为马斯克违反了美国证券法律和上市公司信息披露规定。最终，其仓促提出的私有化收购也未能变成现实。\n\n美国证券交易委员会对马斯克上述帖子发起了证券欺诈的指控，批评他违反了有关信息披露的美国证券法。最终，马斯克和证交会签署了和解协议，他不仅与公司被分别处于2000万美元的罚款，本人也不得不辞去董事长职务。');

-- ----------------------------
-- Table structure for jun_demo_page
-- ----------------------------
DROP TABLE IF EXISTS `jun_demo_page`;
CREATE TABLE `jun_demo_page` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `columnpid` varchar(15) NOT NULL COMMENT '栏目id',
  `status` tinyint(1) DEFAULT '0' COMMENT '状态 0|1 禁用|启用',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '时间',
  `title` varchar(255) DEFAULT NULL,
  `content` mediumtext,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='单页模型表';

-- ----------------------------
-- Records of jun_demo_page
-- ----------------------------

-- ----------------------------
-- Table structure for jun_edition
-- ----------------------------
DROP TABLE IF EXISTS `jun_edition`;
CREATE TABLE `jun_edition` (
  `e_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID',
  `e_edition` varchar(20) DEFAULT NULL COMMENT '版本号',
  `e_time` varchar(25) DEFAULT NULL COMMENT '发布时间',
  `e_status` tinyint(1) DEFAULT '0' COMMENT '发布状态 0|1  关闭|显示',
  `e_content` text COMMENT '版本更新内容',
  `e_add_time` int(10) DEFAULT NULL COMMENT '添加时间',
  `admin_id` int(11) DEFAULT NULL COMMENT '添加者ID',
  PRIMARY KEY (`e_id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8 COMMENT='版本表';

-- ----------------------------
-- Records of jun_edition
-- ----------------------------
INSERT INTO `jun_edition` VALUES ('1', 'v1.0.1', '2018-10-09 00:00:00', '1', '<ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">发布</span>&nbsp;全国省市区三级联动库</li><li><span class=\"label label-warning\" style=\"text-align: center;\">发布</span>&nbsp;基于（部门+岗位+角色+地区）实现的RBAC权限控制</li><li><span class=\"label label-warning\" style=\"text-align: center;\">发布</span>&nbsp;便捷的权限菜单管理模块</li><li><span class=\"label label-warning\" style=\"text-align: center;\">发布</span>&nbsp;版本管理</li><li><span class=\"label label-warning\" style=\"text-align: center;\">发布</span>&nbsp;日志编码管理</li><li><span class=\"label label-warning\" style=\"text-align: center;\">发布</span>&nbsp;维护公告管理</li><li><span class=\"label label-warning\" style=\"text-align: center;\">发布</span>&nbsp;在线数据表详情预览</li><li><span class=\"label label-warning\" style=\"text-align: center;\">发布</span>&nbsp;敏感词管理</li><li><span class=\"label label-warning\" style=\"text-align: center;\">发布</span>&nbsp;全站IP封禁管理</li><li><span class=\"label label-warning\" style=\"text-align: center;\">发布</span>&nbsp;全站控制器文档自动生成</li></ul>', '1514875608', '3');
INSERT INTO `jun_edition` VALUES ('2', 'v1.0.2', '2018-10-09 00:00:00', '1', '<ul class=\"list-unstyled\"><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;后台Database.php控制器生成文档失败</li><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;使用$this-&gt;addLog函数进行跳转时只触发error操作</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;API参数管理模块</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;秒嘀短信API</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;SMTP邮件发送API</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;部门模块由无限极添加，修改为最多只能新增3级</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;岗位模块由无限极添加，修改为最多只能新增4级</li></ul>', '1539138456', '3');
INSERT INTO `jun_edition` VALUES ('3', 'v1.0.3', '2018-10-10 00:00:00', '1', '<ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;后台左侧菜单搜索功能</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;阿里大鱼短信API</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;七牛云OSS云存储API</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;layui编辑器上传文件时可自动适应七牛云OSS存储切换</li></ul>', '1539138499', '3');
INSERT INTO `jun_edition` VALUES ('4', 'v1.0.4', '2018-10-12 09:14:47', '1', '<p><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发参数管理</p><p><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发SDK封装</p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发SDK-Token认证</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发SDK-自定义菜单</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发SDK-自动回复</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发SDK-事件监听</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发SDK-日志写入</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信自动回复内容管理</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;JunCMS二次开发文档排版自适应错乱</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;清除缓存按钮未做页面权限判断</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;无法添加顶级地区</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;__ADMIN__常量在linux下适应错误</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;删除后台大部分没用的JS+CSS文件</li></ul></p>', '1539307148', '3');
INSERT INTO `jun_edition` VALUES ('5', 'v1.0.5', '2018-10-12 00:00:00', '1', '<p><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;全站文件BOM头检测与修复</p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信域名屏蔽检测API</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;免费快递查询API</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;网站收录量查询API</li></ul></p>', '1539315920', '3');
INSERT INTO `jun_edition` VALUES ('6', 'v1.0.6', '2018-10-16 00:00:00', '1', '<p>&nbsp;</p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发API-模板消息</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发API-微信浏览器自动登录</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发API-二维码生成</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发API-短连接转换</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;API参数管理中，无法切换微信登录方式</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;微信开发API-普通Access-Token过期无法自动更新缓存</li></ul></p>', '1539656905', '3');
INSERT INTO `jun_edition` VALUES ('7', 'v1.0.7', '2018-10-18 09:59:33', '1', '<p><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发API-JSAPI支付</p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发API-二维码支付(两种模式)</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发API-支付订单操作</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;微信开发API-支付退款操作</li></ul></p><p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;API参数管理中新增微信支付参数管理</li></ul></p>', '1539739102', '3');
INSERT INTO `jun_edition` VALUES ('8', 'v1.0.8', '2018-11-30 00:00:00', '1', '<p>&nbsp;</p><p></p><ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;CMD工具-在后台顶部导航中点击启动</li></ul><p></p><p></p><ul class=\"list-unstyled\"><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;屏蔽了淘宝接口获取ip地址的错误信息，如果需要准确获取IP地址，建议自行换成百度的接口。</li></ul>', '1542792856', '3');
INSERT INTO `jun_edition` VALUES ('9', 'v1.0.9', '2018-11-30 00:00:00', '1', '<p>1、CMD命令行模块的改动：</p><p>&nbsp;A、加入 vim 分支</p><p>&nbsp;B、mk分支加入 -c 指令，修改文件夹权限</p><p>&nbsp;C、tk分支加入 -c 指令，修改文件权限</p><p><br></p><p>2、整合第三方登录API，封装成API扩展库</p>', '1543571491', '3');
INSERT INTO `jun_edition` VALUES ('10', 'v1.1.0', '2018-12-21 09:24:04', '1', '<p>&nbsp;</p><ul class=\"list-unstyled\"><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;JunCMS系统 更名为 JunAMS系统</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;ThinkPHP 核心包升级到5.0.23版本 (修复服务器提权漏洞)</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;后台增加php进程管理菜单</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;后台增加流量警报功能 - 峰值设置等信息在API设置中修改</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;后台增加定时流量监控功能</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;后台服务器信息菜单，加入CPU内存详情、PHP已编译模块检测、PHP禁用函数检测、组件支持检测、PHP相关参数等详情显示</li><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;后台文档生成语法错误</li><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;【邮件API】的邮件内容为固定字符串BUG</li></ul>', '1545355770', '3');
INSERT INTO `jun_edition` VALUES ('11', 'v1.1.1', '2018-12-24 11:51:29', '1', '<p>&nbsp;</p><ul class=\"list-unstyled\"><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;后台流量监控检测 由公共权限改为独立权限，防止所有管理员都能触发监控</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;【居民身份证真实性查询API】</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;【手机归属地查询API】</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;【百度翻译API】</li><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;【微信API】access_token.json文件为空时，无法更新access_token的BUG</li></ul>', '1545623817', '3');
INSERT INTO `jun_edition` VALUES ('12', 'v.1.1.2', '2019-03-15 00:00:00', '1', '<ul class=\"list-unstyled\"><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;ThinkPHP 核心包升级到5.0.24版本 (修复服务器提权漏洞)</li><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;【微信API】Token过期，无法正常更新access_token的BUG</li><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;__ADMIN__ 常量在Windows环境下无法正确获取的BUG</li></ul>', '1552878452', '3');
INSERT INTO `jun_edition` VALUES ('13', 'v.1.1.3', '2019-03-18 11:07:56', '1', '<p>1、升级改版后台登录界面</p><p>2、后台前三次登录提交不需要输入验证码</p><p>3、后台登录加入一周内记住密码</p><p>4、加入简单的密码表加解密类，可以对数据进行简单加解密</p><p>5、修正开发文档部分错误处</p>', '1552878483', '3');
INSERT INTO `jun_edition` VALUES ('14', 'v1.1.4', '2019-03-18 11:31:04', '1', '&nbsp;', '1552879867', '3');
INSERT INTO `jun_edition` VALUES ('15', 'v1.1.5', '2019-03-26 00:00:00', '1', '<ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;index项目对应的示例页面</li><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;【ams:tag】标签，用于读取模型对应的 下拉菜单、多选框、单选框的内容成数组返回</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;ams:list标签优化order条件，DB链改为orderRaw</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;ams:list标签优化where查询条件，支持嵌套父类条件</li><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;后台CMS内容管理列表查询条件无效的BUG</li></ul>', '1553742224', '3');
INSERT INTO `jun_edition` VALUES ('16', 'v1.1.6', '2019-03-28 00:00:00', '1', '<p>1、Windows系统下，进程监控页面报错，应该提示不可用</p><p>2、Windows系统下，main轮询流量检测报错，改为windows系统不检测</p><p>3、CMS模型，创建字段没加入字段描述</p><p>4、加入一个根据IP获得省市区地址的API</p><p>5、后台登录处理的IP地区查询，由原来的淘宝API修改为新增的API</p>', '1553742236', '3');
INSERT INTO `jun_edition` VALUES ('17', 'v1.1.7', '2019-03-30 00:00:00', '1', '<ul class=\"list-unstyled\"><li><span class=\"label label-warning\" style=\"text-align: center;\">新增</span>&nbsp;【CMS项目导出功能】</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;favicon.ico图标</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;后台TAB切换由一个iframe改为自动生成多个</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;后台新建权限菜单时，controller控制器不存在则会自动创建</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;后台新建权限菜单时，action方法不存在则会自动创建</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;后台新建-修改权限菜单时，对应的方法名称会自动全转换为小写</li><li><span class=\"label label-success\" style=\"text-align: center;\">优化</span>&nbsp;JunAMS安装时，加入必设0777权限判断</li><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;修复Ipcity接口，对识别127.0.0.1时报错</li><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;修复后台权限菜单，在list列表中，点击新增菜单无法正常添加</li><li><span class=\"label label-info\" style=\"text-align: center;\">修复</span>&nbsp;修复JunAMS安装成功后，跳转按钮路径错误</li></ul>', '1553762108', '3');
INSERT INTO `jun_edition` VALUES ('18', 'v1.1.8', '2019-04-01 00:00:00', '1', '<p>1、JunAMS安装时，加入安装次数统计发送</p><p>2、后台限制不允许导出index项目，因为该项目为JunAMS的Demo演示</p><p>3、加入项目删除功能</p><p>4、加入项目导入功能</p>', '1554099966', '3');

-- ----------------------------
-- Table structure for jun_item
-- ----------------------------
DROP TABLE IF EXISTS `jun_item`;
CREATE TABLE `jun_item` (
  `i_id` varchar(15) NOT NULL COMMENT '项目ID',
  `i_name` varchar(48) DEFAULT NULL COMMENT '项目名称',
  `i_path` varchar(48) DEFAULT NULL COMMENT '项目目录名称',
  `i_des` varchar(255) DEFAULT NULL COMMENT '项目描述',
  `i_logo` varchar(128) DEFAULT NULL COMMENT '项目logo地址',
  `i_author` varchar(48) DEFAULT NULL COMMENT '项目作者',
  `i_status` tinyint(1) DEFAULT '0' COMMENT '是否启用该项目 0|1 否|是',
  `i_add_time` int(10) DEFAULT NULL COMMENT '项目创建时间',
  PRIMARY KEY (`i_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CMS - 项目表';

-- ----------------------------
-- Records of jun_item
-- ----------------------------
INSERT INTO `jun_item` VALUES ('5c8f383470c45', '官方默认', 'index', 'JunAMS默认的CMS模块演示项目。', '/public/cms/logo/20190318/8e51f8fe1281a5cc67ae23a4266b4925.jpg', '小黄牛', '1', '1552893423');

-- ----------------------------
-- Table structure for jun_item_column
-- ----------------------------
DROP TABLE IF EXISTS `jun_item_column`;
CREATE TABLE `jun_item_column` (
  `ic_id` varchar(15) NOT NULL,
  `ic_pid` varchar(15) DEFAULT '0' COMMENT '父ID',
  `i_id` varchar(15) DEFAULT NULL COMMENT '项目ID',
  `ic_path` varchar(255) DEFAULT NULL COMMENT '全路径，用于排序',
  `ic_level` tinyint(3) DEFAULT '0' COMMENT '栏目等级',
  `ic_title` varchar(128) DEFAULT NULL COMMENT '栏目名称',
  `ic_href` varchar(255) DEFAULT NULL COMMENT '栏目链接地址',
  `ic_icon` varchar(64) DEFAULT NULL COMMENT 'ICON图标字符串',
  `ic_high` tinyint(1) DEFAULT '0' COMMENT '是否默认高亮 0|1 否|是',
  PRIMARY KEY (`ic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CMS - 栏目表';

-- ----------------------------
-- Records of jun_item_column
-- ----------------------------
INSERT INTO `jun_item_column` VALUES ('5c99ba353c846', '0', '5c8f383470c45', '5c99ba353c846', '0', '首页', '/', '', '1');
INSERT INTO `jun_item_column` VALUES ('5c99e72204ef1', '0', '5c8f383470c45', '5c99e72204ef1', '0', 'IT资讯', '/news/index/id/5c9991de4c180.html', '', '0');
INSERT INTO `jun_item_column` VALUES ('5c99e72929fae', '0', '5c8f383470c45', '5c99e72929fae', '0', '创业客', '/news/index/id/5c9992b5333fe.html', '', '0');

-- ----------------------------
-- Table structure for jun_item_content
-- ----------------------------
DROP TABLE IF EXISTS `jun_item_content`;
CREATE TABLE `jun_item_content` (
  `ic_id` varchar(15) NOT NULL COMMENT 'ILDM主键',
  `ic_pid` varchar(15) DEFAULT NULL COMMENT '父ID',
  `i_id` varchar(15) DEFAULT NULL COMMENT '项目ID',
  `im_id` varchar(15) DEFAULT NULL COMMENT '模型ID',
  `ic_title` varchar(48) DEFAULT NULL COMMENT '控制器别名',
  `ic_name` varchar(48) DEFAULT NULL COMMENT '控制器名称',
  `ic_des` varchar(255) DEFAULT NULL COMMENT '控制器描述',
  `ic_wap` tinyint(1) DEFAULT '0' COMMENT '是否创建手机版本 0|1 否|是',
  `ic_add_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `ic_author` varchar(48) DEFAULT NULL COMMENT '创建者',
  PRIMARY KEY (`ic_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CMS - 控制器表';

-- ----------------------------
-- Records of jun_item_content
-- ----------------------------
INSERT INTO `jun_item_content` VALUES ('5c9991de4c180', '0', '5c8f383470c45', '5c998f3953a19', 'IT资讯', 'News', '', '0', '1553568222', '小黄牛');
INSERT INTO `jun_item_content` VALUES ('5c9992b5333fe', '0', '5c8f383470c45', '5c998f3953a19', '创业客', 'News', '', '0', '1553568437', '小黄牛');
INSERT INTO `jun_item_content` VALUES ('5c9995f0eb7a0', '0', '5c8f383470c45', '5c998f726056d', '轮播图', 'Benner', '', '0', '1553569264', '小黄牛');

-- ----------------------------
-- Table structure for jun_item_field
-- ----------------------------
DROP TABLE IF EXISTS `jun_item_field`;
CREATE TABLE `jun_item_field` (
  `if_id` varchar(15) NOT NULL COMMENT '字段ID',
  `im_id` varchar(15) DEFAULT NULL COMMENT '模型ID',
  `if_type` varchar(28) DEFAULT NULL COMMENT '字段类型',
  `if_name` varchar(48) DEFAULT NULL COMMENT '字段名',
  `if_title` varchar(68) DEFAULT NULL COMMENT '字段别名',
  `if_length` varchar(28) DEFAULT NULL COMMENT '字段长度',
  `if_des` varchar(128) DEFAULT NULL COMMENT '字段提示',
  `if_content` text COMMENT '表单输入相关参数',
  `if_default` varchar(128) DEFAULT NULL COMMENT '默认值',
  `if_min` int(11) DEFAULT NULL COMMENT '最小输入长度',
  `if_max` int(11) DEFAULT NULL COMMENT '最大输入长度',
  `if_regular` varchar(128) DEFAULT NULL COMMENT '正则表达式',
  `if_alert` varchar(255) DEFAULT NULL COMMENT '数据效验未通过的提示',
  `if_notnull` tinyint(1) DEFAULT '0' COMMENT '是否必填字段 0|1 否|是',
  `if_only` tinyint(1) DEFAULT '0' COMMENT '是否唯一字段 0|1 否|是',
  `if_text` tinyint(3) DEFAULT '0' COMMENT '若是编辑器类型，该字段则为使用的文本编辑器',
  `if_is_data` tinyint(1) DEFAULT '0' COMMENT '是否为附表字段 0|1 否|是',
  `if_status` tinyint(1) DEFAULT '1' COMMENT '启用状态 0|1 禁用|启用',
  `if_add_time` int(10) DEFAULT NULL COMMENT '添加时间',
  `if_author` varchar(48) DEFAULT NULL COMMENT '创建人',
  `if_sort` int(11) DEFAULT '0' COMMENT '排序',
  PRIMARY KEY (`if_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CMS - 字段管理';

-- ----------------------------
-- Records of jun_item_field
-- ----------------------------

-- ----------------------------
-- Table structure for jun_item_model
-- ----------------------------
DROP TABLE IF EXISTS `jun_item_model`;
CREATE TABLE `jun_item_model` (
  `im_id` varchar(15) NOT NULL COMMENT '模型ID',
  `i_id` varchar(15) DEFAULT NULL COMMENT '项目ID',
  `im_name` varchar(48) DEFAULT NULL COMMENT '模型名称',
  `im_table` varchar(48) DEFAULT NULL COMMENT '模型表名',
  `im_des` varchar(255) DEFAULT NULL COMMENT '模型描述',
  `im_type` tinyint(1) DEFAULT '0' COMMENT '模板分离类型 0|1 共用|分离',
  `im_class` tinyint(1) DEFAULT '0' COMMENT '是否创建data附表 0|1 不|是',
  `im_status` tinyint(1) DEFAULT '1' COMMENT '模型状态 0|1 关闭|启用',
  `im_add_time` int(10) DEFAULT NULL COMMENT '创建时间',
  `im_author` varchar(48) DEFAULT NULL COMMENT '创建人',
  PRIMARY KEY (`im_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='CMS - 模型表';

-- ----------------------------
-- Records of jun_item_model
-- ----------------------------
INSERT INTO `jun_item_model` VALUES ('5c998f3953a19', '5c8f383470c45', '文章模型', 'demo_news', '', '0', '1', '1', '1553567545', '小黄牛');
INSERT INTO `jun_item_model` VALUES ('5c998f726056d', '5c8f383470c45', '轮播图模型', 'demo_benner', '', '0', '0', '1', '1553567602', '小黄牛');
INSERT INTO `jun_item_model` VALUES ('5c998f87d764e', '5c8f383470c45', '单页模型', 'demo_page', '', '0', '0', '1', '1553567623', '小黄牛');

-- ----------------------------
-- Table structure for jun_job
-- ----------------------------
DROP TABLE IF EXISTS `jun_job`;
CREATE TABLE `jun_job` (
  `j_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `j_name` varchar(30) NOT NULL COMMENT '岗位名称',
  `j_pid` char(13) NOT NULL DEFAULT '0' COMMENT '父ID',
  `add_time` int(5) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `r_id` varchar(255) DEFAULT NULL COMMENT '角色ID',
  PRIMARY KEY (`j_id`)
) ENGINE=MyISAM AUTO_INCREMENT=34 DEFAULT CHARSET=utf8 COMMENT='岗位表';

-- ----------------------------
-- Records of jun_job
-- ----------------------------
INSERT INTO `jun_job` VALUES ('1', '董事长', '0', '1514881663', '2');
INSERT INTO `jun_job` VALUES ('2', '总裁', '1', '1514881680', '2');
INSERT INTO `jun_job` VALUES ('3', '招商 - 经理', '2', '1514881725', '2');
INSERT INTO `jun_job` VALUES ('11', '行政 - 经理', '2', '1514882365', '1,2');
INSERT INTO `jun_job` VALUES ('7', '财务 - 经理', '2', '1514881939', '2');
INSERT INTO `jun_job` VALUES ('12', '行政 - 副经理', '11', '1514882488', '1');

-- ----------------------------
-- Table structure for jun_log_type
-- ----------------------------
DROP TABLE IF EXISTS `jun_log_type`;
CREATE TABLE `jun_log_type` (
  `lt_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键ID，日志编号',
  `lt_mode` tinyint(2) DEFAULT '1' COMMENT '类别 参考admin基类下的Log_Type函数',
  `lt_name` varchar(30) DEFAULT NULL COMMENT '类型名称',
  PRIMARY KEY (`lt_id`)
) ENGINE=MyISAM AUTO_INCREMENT=74 DEFAULT CHARSET=utf8 COMMENT='日志编码表';

-- ----------------------------
-- Records of jun_log_type
-- ----------------------------
INSERT INTO `jun_log_type` VALUES ('33', '1', '修改封禁IP');
INSERT INTO `jun_log_type` VALUES ('2', '1', '修改日志编码');
INSERT INTO `jun_log_type` VALUES ('3', '1', '删除日志编码');
INSERT INTO `jun_log_type` VALUES ('4', '1', '新增版本号');
INSERT INTO `jun_log_type` VALUES ('5', '1', '修改版本号');
INSERT INTO `jun_log_type` VALUES ('6', '1', '删除版本号');
INSERT INTO `jun_log_type` VALUES ('7', '1', '新增岗位');
INSERT INTO `jun_log_type` VALUES ('8', '1', '修改岗位');
INSERT INTO `jun_log_type` VALUES ('9', '1', '删除岗位');
INSERT INTO `jun_log_type` VALUES ('10', '1', '新增职级');
INSERT INTO `jun_log_type` VALUES ('11', '1', '修改职级');
INSERT INTO `jun_log_type` VALUES ('12', '1', '删除职级');
INSERT INTO `jun_log_type` VALUES ('13', '1', '新增地区');
INSERT INTO `jun_log_type` VALUES ('14', '1', '修改地区');
INSERT INTO `jun_log_type` VALUES ('15', '1', '删除地区');
INSERT INTO `jun_log_type` VALUES ('16', '1', '新增部门');
INSERT INTO `jun_log_type` VALUES ('17', '1', '修改部门');
INSERT INTO `jun_log_type` VALUES ('18', '1', '删除部门');
INSERT INTO `jun_log_type` VALUES ('19', '1', '新增角色');
INSERT INTO `jun_log_type` VALUES ('20', '1', '修改角色');
INSERT INTO `jun_log_type` VALUES ('21', '1', '删除角色');
INSERT INTO `jun_log_type` VALUES ('22', '1', '新增权限');
INSERT INTO `jun_log_type` VALUES ('23', '1', '修改权限');
INSERT INTO `jun_log_type` VALUES ('24', '1', '删除权限');
INSERT INTO `jun_log_type` VALUES ('25', '1', '新增管理员');
INSERT INTO `jun_log_type` VALUES ('26', '1', '修改管理员');
INSERT INTO `jun_log_type` VALUES ('27', '1', '删除管理员');
INSERT INTO `jun_log_type` VALUES ('28', '1', '删除管理员登录日志');
INSERT INTO `jun_log_type` VALUES ('29', '1', '删除管理员操作日志');
INSERT INTO `jun_log_type` VALUES ('30', '1', '清空管理员操作日志');
INSERT INTO `jun_log_type` VALUES ('31', '1', '修改敏感词内容');
INSERT INTO `jun_log_type` VALUES ('32', '1', '新增封禁IP');
INSERT INTO `jun_log_type` VALUES ('34', '1', '删除封禁IP');
INSERT INTO `jun_log_type` VALUES ('35', '1', '修改维护公告');
INSERT INTO `jun_log_type` VALUES ('36', '1', '清除全站缓存');
INSERT INTO `jun_log_type` VALUES ('37', '1', '修改个人配置信息');
INSERT INTO `jun_log_type` VALUES ('38', '1', '修改API配置参数');
INSERT INTO `jun_log_type` VALUES ('39', '1', '更新微信菜单');
INSERT INTO `jun_log_type` VALUES ('40', '1', '拉取微信菜单');
INSERT INTO `jun_log_type` VALUES ('41', '1', '删除微信菜单');
INSERT INTO `jun_log_type` VALUES ('42', '1', '新增微信自动回复内容');
INSERT INTO `jun_log_type` VALUES ('43', '1', '修改微信自动回复内容');
INSERT INTO `jun_log_type` VALUES ('44', '1', '删除微信自动回复内容');
INSERT INTO `jun_log_type` VALUES ('45', '1', '清除文件BOM头');
INSERT INTO `jun_log_type` VALUES ('46', '1', '强制杀死进程');
INSERT INTO `jun_log_type` VALUES ('47', '1', '上传项目LOGO');
INSERT INTO `jun_log_type` VALUES ('48', '1', '创建新项目');
INSERT INTO `jun_log_type` VALUES ('49', '1', '切换项目使用');
INSERT INTO `jun_log_type` VALUES ('50', '1', '修改项目信息');
INSERT INTO `jun_log_type` VALUES ('51', '1', '创建模型');
INSERT INTO `jun_log_type` VALUES ('52', '1', '切换模型状态');
INSERT INTO `jun_log_type` VALUES ('53', '1', '创建字段');
INSERT INTO `jun_log_type` VALUES ('54', '1', '删除字段');
INSERT INTO `jun_log_type` VALUES ('55', '1', '切换字段状态');
INSERT INTO `jun_log_type` VALUES ('56', '1', '修改字段');
INSERT INTO `jun_log_type` VALUES ('57', '1', '修改模型');
INSERT INTO `jun_log_type` VALUES ('58', '1', '删除模型');
INSERT INTO `jun_log_type` VALUES ('59', '1', '新建ILDM');
INSERT INTO `jun_log_type` VALUES ('60', '1', '删除ILDM');
INSERT INTO `jun_log_type` VALUES ('61', '1', '修改ILDM');
INSERT INTO `jun_log_type` VALUES ('62', '1', '删除ILDM内容');
INSERT INTO `jun_log_type` VALUES ('63', '1', '切换ILDM内容状态');
INSERT INTO `jun_log_type` VALUES ('64', '1', '修改字段排序');
INSERT INTO `jun_log_type` VALUES ('65', '1', '发布ILDM内容');
INSERT INTO `jun_log_type` VALUES ('66', '1', '修改ILDM内容');
INSERT INTO `jun_log_type` VALUES ('67', '1', '添加栏目');
INSERT INTO `jun_log_type` VALUES ('68', '1', '删除栏目');
INSERT INTO `jun_log_type` VALUES ('69', '1', '修改栏目');
INSERT INTO `jun_log_type` VALUES ('70', '1', '修改代码文件');
INSERT INTO `jun_log_type` VALUES ('71', '1', '删除代码备份文件');
INSERT INTO `jun_log_type` VALUES ('72', '1', '恢复代码备份文件');
INSERT INTO `jun_log_type` VALUES ('73', '1', '删除项目');

-- ----------------------------
-- Table structure for jun_manager
-- ----------------------------
DROP TABLE IF EXISTS `jun_manager`;
CREATE TABLE `jun_manager` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '管理员ID',
  `m_user` varchar(30) DEFAULT NULL COMMENT '用户名',
  `m_pwd` varchar(35) DEFAULT NULL COMMENT 'MD5后的密码',
  `m_nice` varchar(20) DEFAULT NULL COMMENT '真实姓名',
  `m_phone` varchar(11) DEFAULT NULL COMMENT '手机号',
  `m_time` int(10) DEFAULT NULL COMMENT '添加时间，秘钥',
  `m_existence` tinyint(1) DEFAULT '1' COMMENT '是否离职 1|2 在职|离职',
  `m_type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '超级管理员 1|2  是|否',
  `m_status` tinyint(1) DEFAULT '1' COMMENT '状态，1开启，2禁用',
  `m_nationwide` tinyint(1) DEFAULT '2' COMMENT '是否开启全国权限 1|2 是|否',
  `m_province` varchar(800) DEFAULT NULL COMMENT '管辖省份',
  `m_city` varchar(800) DEFAULT NULL COMMENT '管辖城市',
  `m_area` varchar(800) DEFAULT NULL COMMENT '管辖区域',
  `m_structure` int(11) DEFAULT NULL COMMENT '部门ID',
  `m_job` int(11) DEFAULT NULL COMMENT '岗位ID',
  `m_auto_time` int(10) DEFAULT NULL COMMENT '七天登录 - 过期时间',
  `m_auto_rand` decimal(6,0) DEFAULT NULL COMMENT '七天登录 - 随机数',
  `m_auto_ip` varchar(32) DEFAULT NULL COMMENT '七天登录 - IP',
  PRIMARY KEY (`m_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='管理员表';

-- ----------------------------
-- Records of jun_manager
-- ----------------------------
INSERT INTO `jun_manager` VALUES ('3', 'admin', 'e1771c1f73001dc037a1579e62bf8271', '小黄牛', '', '1516259411', '1', '1', '1', '1', '', '', '', '0', '0', '0', '0', '');

-- ----------------------------
-- Table structure for jun_manager_action_log
-- ----------------------------
DROP TABLE IF EXISTS `jun_manager_action_log`;
CREATE TABLE `jun_manager_action_log` (
  `mal_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `m_id` int(11) DEFAULT NULL COMMENT '管理员ID',
  `mal_type` varchar(40) DEFAULT NULL COMMENT '操作类型',
  `mal_des` varchar(50) DEFAULT NULL COMMENT '详细描述',
  `mal_status` tinyint(1) DEFAULT NULL COMMENT '操作状态 1成功， 2失败，3异常',
  `mal_mode` varchar(10) DEFAULT NULL COMMENT '请求类型',
  `mal_ip` varchar(15) DEFAULT NULL COMMENT '操作时的IP',
  `mal_url` varchar(255) DEFAULT NULL COMMENT '操作的完整URL',
  `mal_time` int(10) DEFAULT NULL COMMENT '操作时间',
  PRIMARY KEY (`mal_id`),
  KEY `m_id` (`m_id`) USING BTREE,
  KEY `mal_type` (`mal_type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=121 DEFAULT CHARSET=utf8 COMMENT='管理员操作日志';

-- ----------------------------
-- Records of jun_manager_action_log
-- ----------------------------

-- ----------------------------
-- Table structure for jun_manager_login_log
-- ----------------------------
DROP TABLE IF EXISTS `jun_manager_login_log`;
CREATE TABLE `jun_manager_login_log` (
  `l_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `m_id` int(11) DEFAULT NULL COMMENT '管理员ID',
  `l_ip` varchar(15) DEFAULT NULL COMMENT '登录IP',
  `l_time` int(10) DEFAULT NULL COMMENT '登录时间',
  `l_province` varchar(15) DEFAULT NULL COMMENT '登录地址省',
  `l_city` varchar(25) DEFAULT NULL COMMENT '登录地址市',
  `l_area` varchar(25) DEFAULT NULL COMMENT '登录地址区',
  PRIMARY KEY (`l_id`),
  KEY `m_id` (`m_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8 COMMENT='管理登录日志表';

-- ----------------------------
-- Records of jun_manager_login_log
-- ----------------------------

-- ----------------------------
-- Table structure for jun_menu
-- ----------------------------
DROP TABLE IF EXISTS `jun_menu`;
CREATE TABLE `jun_menu` (
  `m_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '菜单ID',
  `m_pid` int(11) DEFAULT '0' COMMENT '父ID',
  `m_name` varchar(20) DEFAULT NULL COMMENT '菜单名称',
  `m_app` varchar(35) DEFAULT NULL COMMENT '入口模块名称',
  `m_controller` varchar(35) DEFAULT '' COMMENT '控制器名称',
  `m_action` varchar(35) DEFAULT NULL COMMENT '方法名称',
  `m_path` varchar(25) DEFAULT NULL COMMENT '全等级路径',
  `m_type` tinyint(1) DEFAULT '1' COMMENT '菜单类型  1：权限认证+菜单  2：只作为菜单',
  `m_display` tinyint(1) DEFAULT '1' COMMENT '显示，1显示，2隐藏',
  `m_status` tinyint(1) DEFAULT '1' COMMENT '状态，1开启，2关闭',
  `m_icon` varchar(60) DEFAULT NULL COMMENT 'ICON的class名',
  `m_remark` varchar(100) DEFAULT NULL COMMENT '备注',
  `m_sort` int(11) DEFAULT '0' COMMENT '排序',
  `e_id` int(11) DEFAULT '1' COMMENT '对应的版本id',
  PRIMARY KEY (`m_id`)
) ENGINE=InnoDB AUTO_INCREMENT=197 DEFAULT CHARSET=utf8 COMMENT='权限菜单表';

-- ----------------------------
-- Records of jun_menu
-- ----------------------------
INSERT INTO `jun_menu` VALUES ('2', '0', '组织架构设置', '', '', '', '/2', '1', '1', '1', ' fa-street-view', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('3', '121', '地区设置', 'admin', 'region', 'index', '1/121/3', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('4', '3', '新增地区', 'admin', 'region', 'add', '1/121/3/4', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('5', '3', '修改地区', 'admin', 'region', 'upd', '1/121/3/5', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('6', '3', '删除地区', 'admin', 'region', 'del', '1/121/3/6', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('7', '3', '地区搜索', 'admin', 'region', 'sou', '1/121/3/7', '2', '2', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('8', '2', '部门设置', 'admin', 'structure', 'index', '1/2/8', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('9', '8', '新建部门', 'admin', 'structure', 'add', '1/2/8/9', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('10', '8', '修改部门', 'admin', 'structure', 'upd', '1/2/8/10', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('11', '8', '删除部门', 'admin', 'structure', 'del', '1/2/8/11', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('13', '2', '岗位设置', 'admin', 'job', 'index', '1/2/13', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('14', '13', '新建岗位', 'admin', 'job', 'add', '1/2/13/14', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('15', '13', '修改岗位', 'admin', 'job', 'upd', '1/2/13/15', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('16', '13', '删除岗位', 'admin', 'job', 'del', '1/2/13/16', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('23', '0', '权限设置', '', '', '', '/23', '1', '1', '1', 'fa-expeditedssl', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('24', '23', '角色管理', 'admin', 'role', 'index', '1/23/24', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('25', '24', '新建角色', 'admin', 'role', 'add', '1/23/24/25', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('26', '24', '修改角色', 'admin', 'role', 'upd', '1/23/24/26', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('27', '24', '删除角色', 'admin', 'role', 'del', '1/23/24/27', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('28', '23', '权限管理', 'admin', 'menu', 'index', '1/23/28', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('29', '28', '新增权限', 'admin', 'menu', 'add', '1/23/28/29', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('30', '28', '修改权限', 'admin', 'menu', 'upd', '1/23/28/30', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('31', '28', '删除权限', 'admin', 'menu', 'del', '1/23/28/31', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('33', '23', '管理员管理', 'admin', 'manager', 'index', '1/23/33', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('34', '33', '新增管理员', 'admin', 'manager', 'add', '1/23/33/34', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('35', '33', '修改管理员', 'admin', 'manager', 'upd', '1/23/33/35', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('36', '33', '删除管理员', 'admin', 'manager', 'del', '1/23/33/36', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('37', '33', '预览详情', 'admin', 'manager', 'details', '1/23/33/37', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('38', '0', '系统设置', '', '', '', '/38', '1', '1', '1', 'fa-cogs', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('39', '38', '版本管理', 'admin', 'edition', 'index', '1/38/39', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('40', '39', '新建版本', 'admin', 'edition', 'add', '1/38/39/40', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('41', '39', '修改版本', 'admin', 'edition', 'upd', '1/38/39/41', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('42', '39', '删除版本', 'admin', 'edition', 'del', '1/38/39/42', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('43', '38', '日志编码设置', 'admin', 'logtype', 'index', '1/38/43', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('44', '43', '新增编码', 'admin', 'logtype', 'add', '1/38/43/44', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('45', '43', '修改编码', 'admin', 'logtype', 'upd', '1/38/43/45', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('46', '43', '删除编码', 'admin', 'logtype', 'del', '1/38/43/46', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('47', '0', '日志管理', '', '', '', '/47', '1', '1', '1', 'fa-opera', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('48', '47', '管理员登录日志', 'admin', 'loginlog', 'index', '/1/47/48', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('49', '48', '删除日志', 'admin', 'loginlog', 'del', '/1/47/48/49', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('50', '47', '后台操作日志', 'admin', 'actionlog', 'index', '/1/47/50', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('51', '50', '删除日志', 'admin', 'actionlog', 'del', '/1/47/50/51', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('52', '50', '清空日志', 'admin', 'actionlog', 'emptyall', '/1/47/50/52', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('53', '50', '预览详情', 'admin', 'actionlog', 'details', '/1/47/50/53', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('54', '0', '服务器 - 数据库', '', '', '', '/54', '1', '1', '1', 'fa-database', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('55', '54', '数据表', 'admin', 'database', 'index', '/1/54/55', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('56', '54', '服务器信息', 'admin', 'database', 'server', '/1/54/56', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('57', '55', '预览详情', 'admin', 'database', 'details', '/1/54/55/57', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('58', '0', '安全设置', '', '', '', '/58', '1', '1', '1', 'fa-cogs', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('59', '58', '敏感词管理', 'admin', 'security', 'sensitive', '/1/58/59', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('60', '59', '修改敏感词内容', 'admin', 'security', 'sensitive_upd', '/1/58/59/60', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('61', '58', 'IP黑名单管理', 'admin', 'security', 'blackip', '/1/58/61', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('62', '61', '封禁IP', 'admin', 'security', 'blackip_add', '/1/58/61/62', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('63', '61', '修改封禁', 'admin', 'security', 'blackip_upd', '/1/58/61/63', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('64', '61', '删除封禁', 'admin', 'security', 'blackip_del', '/1/58/61/64', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('65', '0', '文档管理', '', '', '', '/65', '1', '1', '1', 'fa-file-word-o', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('66', '65', 'JunAMS 二次开发文档', 'admin', 'docroot', 'juncms', '/65/66', '2', '1', '1', 'fa-file-word-o', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('67', '38', '维护公告设置', 'admin', 'notice', 'index', '1/38/67', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('68', '67', '修改公告内容', 'admin', 'notice', 'upd', '1/38/67/68', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('74', '33', '搜索 管理员', 'admin', 'manager', 'sou', '1/23/33/74', '2', '2', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('101', '100', '利润设置', '', '', '', '100/101', '1', '1', '1', 'icon-cog', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('102', '101', '车险返点', 'admin', 'rebate', 'index', '100/101/102', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('103', '102', '修改返点', 'admin', 'rebate', 'upd', '100/101/102/103', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('104', '101', '意外险返点', 'admin', 'rebate', 'accident', '100/101/104', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('106', '104', '修改返点', 'admin', 'rebate', 'accident_upd', '100/101/104/106', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('107', '100', '保险公司管理', '', '', '', '100/107', '1', '1', '1', 'graph-16-thin-crm', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('108', '107', '泛华普通流程', 'admin', 'fanhuacompany', 'index', '100/107/108', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('109', '108', '编辑保险公司', 'admin', 'fanhuacompany', 'upd', '100/107/108/109', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('110', '108', '共享保险公司', 'admin', 'fanhuacompany', 'share', '100/107/108/110', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('111', '108', '返点政策列表', 'admin', 'fanhuacompany', 'rebate_list', '100/107/108/111', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('112', '108', '获取保险公司', 'admin', 'fanhuacompany', 'sou', '100/107/108/112', '2', '2', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('113', '108', '新建返点规则', 'admin', 'fanhuacompany', 'rebate_add', '100/107/108/113', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('116', '108', '修改规则返点率', 'admin', 'fanhuacompany', 'rate_upd', '100/107/108/116', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('117', '108', '修改排序', 'admin', 'fanhuacompany', 'rebate_sort', '100/107/108/117', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('118', '108', '修改返点规则', 'admin', 'fanhuacompany', 'rebate_upd', '100/107/108/118', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('119', '108', '删除返点规则', 'admin', 'fanhuacompany', 'rebate_del', '100/107/108/119', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('120', '108', '修改基础返点率', 'admin', 'fanhuacompany', 'basics_rate_upd', '100/107/108/120', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('121', '100', '地区管理', 'admin', '', '', '100/121', '1', '1', '1', 'icon-cog', '', '9', '1');
INSERT INTO `jun_menu` VALUES ('123', '2', '地区管理', 'admin', 'region', 'index', '1/2/123', '2', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('124', '123', '新增地区', 'admin', 'region', 'add', '1/2/123/124', '2', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('125', '123', '修改地区', 'admin', 'region', 'upd', '1/2/123/125', '2', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('126', '123', '删除地区', 'admin', 'region', 'del', '1/2/123/126', '2', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('127', '65', '后台控制器文档', 'admin', 'docroot', 'admin', '/1/65/127', '1', '1', '1', 'fa-file-word-o', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('128', '127', '预览文档函数列表', 'admin', 'docroot', 'showlist', '/1/65/127/128', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('129', '128', '预览函数内部详情', 'admin', 'docroot', 'details', '/1/65/127/128/129', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('130', '0', '清除缓存', 'admin', 'index', 'runtime_del', '/130', '1', '2', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('131', '0', '修改个人配置信息', 'admin', 'manager', 'profile', '131', '2', '2', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('132', '38', 'API设置', 'admin', 'deploy', 'index', '/38/132', '1', '1', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('133', '132', '修改配置', 'admin', 'deploy', 'upd', '/38/132/133', '1', '2', '1', '', '', '0', '1');
INSERT INTO `jun_menu` VALUES ('134', '132', '更新微信菜单', 'admin', 'deploy', 'wx_menu_save', '/38/132/134', '1', '2', '1', '', '', '0', '3');
INSERT INTO `jun_menu` VALUES ('135', '132', '拉取微信菜单', 'admin', 'deploy', 'wx_menu_laqu', '/38/132/135', '1', '2', '1', '', '', '0', '3');
INSERT INTO `jun_menu` VALUES ('136', '132', '删除微信菜单', 'admin', 'deploy', 'wx_menu_delete', '/38/132/136', '1', '2', '1', '', '', '0', '3');
INSERT INTO `jun_menu` VALUES ('137', '0', '微信管理', 'admin', '', '', '/137', '1', '1', '1', 'fa-weixin', '', '0', '4');
INSERT INTO `jun_menu` VALUES ('138', '137', '自动回复内容管理', 'admin', 'weixin', 'auto_index', '/137/138', '1', '1', '1', '', '', '0', '4');
INSERT INTO `jun_menu` VALUES ('139', '138', '新增回复内容', 'admin', 'weixin', 'auto_add', '/137/138/139', '1', '2', '1', '', '', '0', '4');
INSERT INTO `jun_menu` VALUES ('140', '138', '修改回复内容', 'admin', 'weixin', 'auto_upd', '/137/138/140', '1', '2', '1', '', '', '0', '4');
INSERT INTO `jun_menu` VALUES ('141', '138', '删除回复内容', 'admin', 'weixin', 'auto_del', '/137/138/141', '1', '2', '1', '', '', '0', '4');
INSERT INTO `jun_menu` VALUES ('142', '0', 'BOM头文件检测与清除', 'admin', 'index', 'bomhead', '142', '1', '2', '1', '', '', '0', '4');
INSERT INTO `jun_menu` VALUES ('143', '0', 'CMD工具', 'admin', 'cmd', 'index', '/143', '1', '2', '1', '', '', '0', '8');
INSERT INTO `jun_menu` VALUES ('144', '54', '流量图表', 'admin', 'database', 'flow', '/54/144', '1', '1', '1', '', '', '0', '10');
INSERT INTO `jun_menu` VALUES ('145', '54', '进程管理', 'admin', 'database', 'process', '/54/145', '1', '1', '1', '', '', '0', '10');
INSERT INTO `jun_menu` VALUES ('146', '145', '强制杀死进程', 'admin', 'database', 'process_delete', '/54/145/146', '1', '1', '1', '', '', '0', '10');
INSERT INTO `jun_menu` VALUES ('147', '0', '流量监控检测', 'admin', 'index', 'warning_flow', '147', '1', '2', '1', '', '', '0', '11');
INSERT INTO `jun_menu` VALUES ('148', '0', 'CMS模块', 'admin', '', '', '148', '1', '1', '1', 'fa-wikipedia-w', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('149', '148', '项目管理', 'admin', 'item', 'index', '148/149', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('150', '149', '创建项目', 'admin', 'item', 'add', '148/149/150', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('151', '149', '修改项目', 'admin', 'item', 'upd', '148/149/151', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('153', '149', '切换项目', 'admin', 'item', 'status', '148/149/153', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('154', '149', '上传logo', 'admin', 'item', 'post_logo', '148/149/154', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('155', '148', '模型管理', 'admin', 'model', 'index', '148/155', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('156', '155', '创建模型', 'admin', 'model', 'add', '148/155/156', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('157', '155', '修改模型', 'admin', 'model', 'upd', '148/155/157', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('158', '155', '删除模型', 'admin', 'model', 'delete', '148/155/158', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('159', '155', '切换状态', 'admin', 'model', 'status', '148/155/159', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('160', '155', '字段管理', 'admin', 'field', 'index', '148/155/160', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('161', '160', '创建字段', 'admin', 'field', 'add', '148/155/160/161', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('162', '160', '修改字段', 'admin', 'field', 'upd', '148/155/160/162', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('163', '160', '删除字段', 'admin', 'field', 'delete', '148/155/160/163', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('164', '160', '切换状态', 'admin', 'field', 'status', '148/155/160/164', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('165', '148', 'ILDM管理', 'admin', 'content', 'index', '148/165', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('166', '165', '创建控制器', 'admin', 'content', 'add', '148/165/166', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('167', '165', '修改控制器', 'admin', 'content', 'upd', '148/165/167', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('168', '165', '删除控制器', 'admin', 'content', 'delete', '148/165/168', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('169', '165', '查询模型属性', 'admin', 'content', 'vif_model', '148/165/169', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('170', '165', '内容管理', 'admin', 'article', 'index', '148/165/170', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('171', '170', '发布内容', 'admin', 'article', 'add', '148/165/170/171', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('172', '170', '修改内容', 'admin', 'article', 'upd', '148/165/170/172', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('173', '170', '删除内容', 'admin', 'article', 'delete', '148/165/170/173', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('174', '170', '切换状态', 'admin', 'article', 'status', '148/165/170/174', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('175', '155', '修改排序', 'admin', 'field', 'sort', '148/155/175', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('176', '148', '栏目管理', 'admin', 'column', 'index', '148/176', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('177', '176', '添加栏目', 'admin', 'column', 'add', '148/176/177', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('178', '176', '修改栏目', 'admin', 'column', 'upd', '148/176/178', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('179', '176', '删除栏目', 'admin', 'column', 'delete', '148/176/179', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('180', '148', '代码管理', 'admin', 'codefile', 'index', '148/180', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('181', '180', '修改代码', 'admin', 'codefile', 'upd', '148/180/181', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('183', '180', '删除备份', 'admin', 'codefile', 'delete', '148/180/183', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('185', '180', '恢复备份', 'admin', 'codefile', 'restore', '148/180/185', '1', '1', '1', '', '', '0', '14');
INSERT INTO `jun_menu` VALUES ('194', '149', '导出项目', 'admin', 'item', 'export', '148/149/194', '1', '1', '1', '', '', '0', '17');
INSERT INTO `jun_menu` VALUES ('195', '149', '删除项目', 'admin', 'item', 'delete', '148/149/195', '1', '1', '1', '', '', '0', '18');
INSERT INTO `jun_menu` VALUES ('196', '149', '导入项目', 'admin', 'item', 'decompose', '148/149/196', '1', '1', '1', '', '', '0', '18');

-- ----------------------------
-- Table structure for jun_region
-- ----------------------------
DROP TABLE IF EXISTS `jun_region`;
CREATE TABLE `jun_region` (
  `r_id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '主键',
  `r_pid` smallint(5) unsigned NOT NULL DEFAULT '0' COMMENT '父ID',
  `r_name` varchar(120) NOT NULL DEFAULT '' COMMENT '地区名称',
  `r_type` tinyint(1) NOT NULL DEFAULT '2' COMMENT '城市级别',
  `r_pinyin` varchar(50) NOT NULL DEFAULT '' COMMENT '拼音',
  `r_code` int(5) NOT NULL DEFAULT '0' COMMENT '地区code代码',
  `r_sort` smallint(3) NOT NULL DEFAULT '1' COMMENT '排序',
  `r_car_prefix` varchar(7) DEFAULT NULL COMMENT '车牌前缀',
  `r_car_type` varchar(80) DEFAULT NULL COMMENT '车辆使用性质，用,号分割',
  PRIMARY KEY (`r_id`),
  KEY `parent_id` (`r_pid`) USING BTREE,
  KEY `region_type` (`r_type`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3441 DEFAULT CHARSET=utf8 COMMENT='省市级表';

-- ----------------------------
-- Records of jun_region
-- ----------------------------
INSERT INTO `jun_region` VALUES ('2', '0', '北京', '1', 'BeiJing', '110000', '1', '京', '');
INSERT INTO `jun_region` VALUES ('3', '0', '安徽', '1', 'AnHui', '340000', '1', '皖', null);
INSERT INTO `jun_region` VALUES ('4', '0', '福建', '1', 'FuJian', '350000', '1', '闽', null);
INSERT INTO `jun_region` VALUES ('5', '0', '甘肃', '1', 'GanSu', '620000', '1', '甘', null);
INSERT INTO `jun_region` VALUES ('6', '0', '广东', '1', 'GuangDong', '440000', '3', '粤', null);
INSERT INTO `jun_region` VALUES ('7', '0', '广西', '1', 'GuangXi', '450000', '1', '桂', null);
INSERT INTO `jun_region` VALUES ('8', '0', '贵州', '1', 'GuiZhou', '520000', '1', '贵', null);
INSERT INTO `jun_region` VALUES ('9', '0', '海南', '1', 'HaiNan', '460000', '1', '琼', null);
INSERT INTO `jun_region` VALUES ('10', '0', '河北', '1', 'HeBei', '130000', '1', '冀', null);
INSERT INTO `jun_region` VALUES ('11', '0', '河南', '1', 'HeNan', '410000', '1', '豫', null);
INSERT INTO `jun_region` VALUES ('12', '0', '黑龙江', '1', 'HeiLongJiang', '230000', '1', '黑', null);
INSERT INTO `jun_region` VALUES ('13', '0', '湖北', '1', 'HuBei', '420000', '1', '鄂', null);
INSERT INTO `jun_region` VALUES ('14', '0', '湖南', '1', 'HuNan', '430000', '1', '湘', null);
INSERT INTO `jun_region` VALUES ('15', '0', '吉林', '1', 'JiLin', '220000', '1', '吉', null);
INSERT INTO `jun_region` VALUES ('16', '0', '江苏', '1', 'JiangSu', '320000', '1', '苏', null);
INSERT INTO `jun_region` VALUES ('17', '0', '江西', '1', 'JiangXi', '360000', '1', '赣', null);
INSERT INTO `jun_region` VALUES ('18', '0', '辽宁', '1', 'LiaoNing', '210000', '1', '辽', null);
INSERT INTO `jun_region` VALUES ('19', '0', '内蒙古', '1', 'NaMengGu', '150000', '1', '蒙', null);
INSERT INTO `jun_region` VALUES ('20', '0', '宁夏', '1', 'NingXia', '640000', '1', '宁', null);
INSERT INTO `jun_region` VALUES ('21', '0', '青海', '1', 'QingHai', '630000', '1', '青', null);
INSERT INTO `jun_region` VALUES ('22', '0', '山东', '1', 'ShanDong', '370000', '1', '鲁', null);
INSERT INTO `jun_region` VALUES ('23', '0', '山西', '1', 'ShanXi', '140000', '1', '晋', null);
INSERT INTO `jun_region` VALUES ('24', '0', '陕西', '1', 'XiAnShi', '610000', '1', '陕', null);
INSERT INTO `jun_region` VALUES ('25', '0', '上海', '1', 'ShangHai', '310000', '1', '沪', null);
INSERT INTO `jun_region` VALUES ('26', '0', '四川', '1', 'SiChuan', '510000', '1', '川', null);
INSERT INTO `jun_region` VALUES ('27', '0', '天津', '1', 'TianJin', '120000', '1', '津', null);
INSERT INTO `jun_region` VALUES ('28', '0', '西藏', '1', 'XiCang', '540000', '1', '藏', null);
INSERT INTO `jun_region` VALUES ('29', '0', '新疆', '1', 'XinJiang', '650000', '1', '新', null);
INSERT INTO `jun_region` VALUES ('30', '0', '云南', '1', 'YunNan', '530000', '1', '云', null);
INSERT INTO `jun_region` VALUES ('31', '0', '浙江', '1', 'ZheJiang', '330000', '1', '浙', null);
INSERT INTO `jun_region` VALUES ('32', '0', '重庆', '1', 'ChongQing', '500000', '1', '渝', null);
INSERT INTO `jun_region` VALUES ('36', '3', '安庆', '2', 'AnQingShi', '340800', '1', '皖H', null);
INSERT INTO `jun_region` VALUES ('37', '3', '蚌埠', '2', 'BangBuShi', '340300', '1', '皖C', null);
INSERT INTO `jun_region` VALUES ('39', '3', '池州', '2', 'ChiZhouShi', '341700', '1', '皖R', null);
INSERT INTO `jun_region` VALUES ('40', '3', '滁州', '2', 'ChuZhouShi', '341100', '1', '皖M', null);
INSERT INTO `jun_region` VALUES ('41', '3', '阜阳', '2', 'FuYangShi', '341200', '1', '皖K', null);
INSERT INTO `jun_region` VALUES ('42', '3', '淮北', '2', 'HuaiBeiShi', '340600', '1', '皖F', null);
INSERT INTO `jun_region` VALUES ('43', '3', '淮南', '2', 'HuaiNanShi', '340400', '1', '皖D', null);
INSERT INTO `jun_region` VALUES ('44', '3', '黄山', '2', 'HuangShanShi', '341000', '1', '皖J', null);
INSERT INTO `jun_region` VALUES ('45', '3', '六安', '2', 'LiuAnShi', '341500', '1', '皖N', null);
INSERT INTO `jun_region` VALUES ('46', '3', '马鞍山', '2', 'MaAnShanShi', '340500', '1', '皖E', null);
INSERT INTO `jun_region` VALUES ('47', '3', '宿州', '2', 'SuZhouShi', '341300', '1', '皖L', null);
INSERT INTO `jun_region` VALUES ('48', '3', '铜陵', '2', 'TongLingShi', '340700', '1', '皖G', null);
INSERT INTO `jun_region` VALUES ('49', '3', '芜湖', '2', 'WuHuShi', '340200', '1', '皖B', null);
INSERT INTO `jun_region` VALUES ('50', '3', '宣城', '2', 'XuanChengShi', '341800', '1', '皖P', null);
INSERT INTO `jun_region` VALUES ('51', '3', '亳州', '2', 'BoZhouShi', '341600', '1', '皖S', null);
INSERT INTO `jun_region` VALUES ('53', '4', '福州', '2', 'FuZhouShi', '350100', '1', '闽A', null);
INSERT INTO `jun_region` VALUES ('54', '4', '龙岩', '2', 'LongYanShi', '350800', '1', '闽F', null);
INSERT INTO `jun_region` VALUES ('55', '4', '南平', '2', 'NanPingShi', '350700', '1', '闽H', null);
INSERT INTO `jun_region` VALUES ('56', '4', '宁德', '2', 'NingDeShi', '350900', '1', '闽J', null);
INSERT INTO `jun_region` VALUES ('57', '4', '莆田', '2', 'PuTianShi', '350300', '1', '闽B', null);
INSERT INTO `jun_region` VALUES ('58', '4', '泉州', '2', 'QuanZhouShi', '350500', '1', '闽C', null);
INSERT INTO `jun_region` VALUES ('59', '4', '三明', '2', 'SanMingShi', '350400', '1', '闽G', null);
INSERT INTO `jun_region` VALUES ('60', '4', '厦门', '2', 'XiaMenShi', '350200', '1', '闽D', null);
INSERT INTO `jun_region` VALUES ('61', '4', '漳州', '2', 'ZhangZhouShi', '350600', '1', '闽E', null);
INSERT INTO `jun_region` VALUES ('62', '5', '兰州', '2', 'LanZhouShi', '620100', '1', '甘A', null);
INSERT INTO `jun_region` VALUES ('63', '5', '白银', '2', 'BaiYinShi', '620400', '1', '甘D', null);
INSERT INTO `jun_region` VALUES ('64', '5', '定西', '2', 'DingXiShi', '621100', '1', '甘J', null);
INSERT INTO `jun_region` VALUES ('65', '5', '甘南', '2', 'GanNanZhou', '623000', '1', '甘P', null);
INSERT INTO `jun_region` VALUES ('66', '5', '嘉峪关', '2', 'JiaYuGuanShi', '620200', '1', '甘B', null);
INSERT INTO `jun_region` VALUES ('67', '5', '金昌', '2', 'JinChangShi', '620300', '1', '甘C', null);
INSERT INTO `jun_region` VALUES ('68', '5', '酒泉', '2', 'JiuQuanShi', '620900', '1', '甘F', null);
INSERT INTO `jun_region` VALUES ('69', '5', '临夏', '2', 'LinXiaZhou', '622900', '1', '甘N', null);
INSERT INTO `jun_region` VALUES ('70', '5', '陇南', '2', 'LongNanShi', '621200', '1', '甘K', null);
INSERT INTO `jun_region` VALUES ('71', '5', '平凉', '2', 'PingLiangShi', '620800', '1', '甘L', null);
INSERT INTO `jun_region` VALUES ('72', '5', '庆阳', '2', 'QingYangShi', '621000', '1', '甘M', null);
INSERT INTO `jun_region` VALUES ('73', '5', '天水', '2', 'TianShuiShi', '620500', '1', '甘E', null);
INSERT INTO `jun_region` VALUES ('74', '5', '武威', '2', 'WuWeiShi', '620600', '1', '甘H', null);
INSERT INTO `jun_region` VALUES ('75', '5', '张掖', '2', 'ZhangYeShi', '620700', '1', '甘G', null);
INSERT INTO `jun_region` VALUES ('76', '6', '广州', '2', 'GuangZhouShi', '440100', '3', '粤A', '1,3,5');
INSERT INTO `jun_region` VALUES ('77', '6', '深圳', '2', 'ShenChouShi', '440300', '1', '粤B', '1,2,3,4,7,9');
INSERT INTO `jun_region` VALUES ('78', '6', '潮州', '2', 'ChaoZhouShi', '445100', '1', '粤U', '1,2,3,4,7,9');
INSERT INTO `jun_region` VALUES ('79', '6', '东莞', '2', 'DongGuanShi', '441900', '1', '粤S', '1,2,3,4,7,9');
INSERT INTO `jun_region` VALUES ('80', '6', '佛山', '2', 'FuShanShi', '440600', '1', '粤E', '1,2,3,4,7,9');
INSERT INTO `jun_region` VALUES ('81', '6', '河源', '2', 'HeYuanShi', '441600', '1', '粤P', null);
INSERT INTO `jun_region` VALUES ('82', '6', '惠州', '2', 'HuiZhouShi', '441300', '1', '粤L', null);
INSERT INTO `jun_region` VALUES ('83', '6', '江门', '2', 'JiangMenShi', '440700', '1', '粤J', null);
INSERT INTO `jun_region` VALUES ('84', '6', '揭阳', '2', 'JieYangShi', '445200', '1', '粤V', null);
INSERT INTO `jun_region` VALUES ('85', '6', '茂名', '2', 'MaoMingShi', '440900', '1', '粤K', null);
INSERT INTO `jun_region` VALUES ('86', '6', '梅州', '2', 'MeiZhouShi', '441400', '1', '粤M', null);
INSERT INTO `jun_region` VALUES ('87', '6', '清远', '2', 'QingYuanShi', '441800', '1', '粤R', null);
INSERT INTO `jun_region` VALUES ('88', '6', '汕头', '2', 'ShanTouShi', '440500', '1', '粤D', null);
INSERT INTO `jun_region` VALUES ('89', '6', '汕尾', '2', 'ShanWeiShi', '441500', '1', '粤N', null);
INSERT INTO `jun_region` VALUES ('90', '6', '韶关', '2', 'ShaoGuanShi', '440200', '1', '粤F', null);
INSERT INTO `jun_region` VALUES ('91', '6', '阳江', '2', 'YangJiangShi', '441700', '1', '粤Q', null);
INSERT INTO `jun_region` VALUES ('92', '6', '云浮', '2', 'YunFuShi', '445300', '1', '粤W', null);
INSERT INTO `jun_region` VALUES ('93', '6', '湛江', '2', 'ZhanJiangShi', '440800', '1', '粤G', null);
INSERT INTO `jun_region` VALUES ('94', '6', '肇庆', '2', 'ZhaoQingShi', '441200', '1', '粤H', null);
INSERT INTO `jun_region` VALUES ('95', '6', '中山', '2', 'ZhongShanShi', '442000', '1', '粤T', null);
INSERT INTO `jun_region` VALUES ('96', '6', '珠海', '2', 'ZhuHaiShi', '440400', '1', '粤C', null);
INSERT INTO `jun_region` VALUES ('97', '7', '南宁', '2', 'NanNingShi', '450100', '1', '桂A', null);
INSERT INTO `jun_region` VALUES ('98', '7', '桂林', '2', 'GuiLinShi', '450300', '1', '桂C', null);
INSERT INTO `jun_region` VALUES ('99', '7', '百色', '2', 'BaiSeShi', '451000', '1', '桂L', null);
INSERT INTO `jun_region` VALUES ('100', '7', '北海', '2', 'BeiHaiShi', '450500', '1', '桂E', null);
INSERT INTO `jun_region` VALUES ('101', '7', '崇左', '2', 'ChongZuoShi', '451400', '1', '桂F', null);
INSERT INTO `jun_region` VALUES ('102', '7', '防城港', '2', 'FangChengGangShi', '450600', '1', '桂P', null);
INSERT INTO `jun_region` VALUES ('103', '7', '贵港', '2', 'GuiGangShi', '450800', '1', '桂R', null);
INSERT INTO `jun_region` VALUES ('104', '7', '河池', '2', 'HeChiShi', '451200', '1', '桂M', null);
INSERT INTO `jun_region` VALUES ('105', '7', '贺州', '2', 'HeZhouShi', '451100', '1', '桂J', null);
INSERT INTO `jun_region` VALUES ('106', '7', '来宾', '2', 'LaiBinShi', '451300', '1', '桂G', null);
INSERT INTO `jun_region` VALUES ('107', '7', '柳州', '2', 'LiuZhouShi', '450200', '1', '桂B', null);
INSERT INTO `jun_region` VALUES ('108', '7', '钦州', '2', 'QinZhouShi', '450700', '1', '桂N', null);
INSERT INTO `jun_region` VALUES ('109', '7', '梧州', '2', 'WuZhouShi', '450400', '1', '桂D', null);
INSERT INTO `jun_region` VALUES ('110', '7', '玉林', '2', 'YuLinShi', '450900', '1', '桂K', null);
INSERT INTO `jun_region` VALUES ('111', '8', '贵阳', '2', 'GuiYangShi', '520100', '1', '贵A', null);
INSERT INTO `jun_region` VALUES ('112', '8', '安顺', '2', 'AnShunShi', '520400', '1', '贵G', null);
INSERT INTO `jun_region` VALUES ('113', '8', '毕节', '2', 'BiJieDiQu', '522500', '1', '贵F', null);
INSERT INTO `jun_region` VALUES ('114', '8', '六盘水', '2', 'LiuPanShuiShi', '520200', '1', '贵B', null);
INSERT INTO `jun_region` VALUES ('115', '8', '黔东南', '2', 'QianDongNanZhou', '522600', '1', '贵H', null);
INSERT INTO `jun_region` VALUES ('116', '8', '黔南', '2', 'QianNanZhou', '522700', '1', '贵J', null);
INSERT INTO `jun_region` VALUES ('117', '8', '黔西南', '2', 'QianXiNanZhou', '522300', '1', '贵E', null);
INSERT INTO `jun_region` VALUES ('118', '8', '铜仁', '2', 'TongRenDiQu', '522200', '1', '贵D', null);
INSERT INTO `jun_region` VALUES ('119', '8', '遵义', '2', 'ZunYiShi', '520300', '1', '贵C', null);
INSERT INTO `jun_region` VALUES ('120', '9', '海口', '2', 'HaiKouShi', '460100', '1', '琼A', null);
INSERT INTO `jun_region` VALUES ('121', '9', '三亚', '2', 'SanYaShi', '460200', '1', '琼B', null);
INSERT INTO `jun_region` VALUES ('122', '9', '白沙', '2', 'BaiShaXian', '469025', '1', null, null);
INSERT INTO `jun_region` VALUES ('123', '9', '保亭', '2', 'BaoTingXian', '469029', '1', null, null);
INSERT INTO `jun_region` VALUES ('124', '9', '昌江', '2', '', '469026', '1', null, null);
INSERT INTO `jun_region` VALUES ('125', '9', '澄迈县', '2', 'ChengMaiXian', '469023', '1', null, null);
INSERT INTO `jun_region` VALUES ('126', '9', '定安县', '2', 'DingAnXian', '469021', '1', null, null);
INSERT INTO `jun_region` VALUES ('127', '9', '东方', '2', 'DongFangShi', '469007', '1', null, null);
INSERT INTO `jun_region` VALUES ('128', '9', '乐东', '2', '', '469027', '1', null, null);
INSERT INTO `jun_region` VALUES ('129', '9', '临高县', '2', 'LinGaoXian', '469024', '1', null, null);
INSERT INTO `jun_region` VALUES ('130', '9', '陵水', '2', '', '469028', '1', null, null);
INSERT INTO `jun_region` VALUES ('131', '9', '琼海', '2', 'QiongHaiShi', '469002', '1', '琼C', null);
INSERT INTO `jun_region` VALUES ('132', '9', '琼中', '2', '', '469030', '1', null, null);
INSERT INTO `jun_region` VALUES ('133', '9', '屯昌县', '2', 'TunChangXian', '469022', '1', null, null);
INSERT INTO `jun_region` VALUES ('134', '9', '万宁', '2', 'WanNingShi', '469006', '1', null, null);
INSERT INTO `jun_region` VALUES ('135', '9', '文昌', '2', 'WenChangShi', '469005', '1', null, null);
INSERT INTO `jun_region` VALUES ('136', '9', '五指山', '2', 'WuZhiShanShi', '469001', '1', '琼D', null);
INSERT INTO `jun_region` VALUES ('137', '9', '儋州', '2', 'DanZhouShi', '469003', '1', null, null);
INSERT INTO `jun_region` VALUES ('138', '10', '石家庄', '2', 'ShiJiaZhuangShi', '130100', '1', '冀A', null);
INSERT INTO `jun_region` VALUES ('139', '10', '保定', '2', 'BaoDingShi', '130600', '1', '冀F', null);
INSERT INTO `jun_region` VALUES ('140', '10', '沧州', '2', 'CangZhouShi', '130900', '1', '冀J', null);
INSERT INTO `jun_region` VALUES ('141', '10', '承德', '2', 'ChengDeShi', '130800', '1', '冀H', null);
INSERT INTO `jun_region` VALUES ('142', '10', '邯郸', '2', 'HanDanShi', '130400', '1', '冀D', null);
INSERT INTO `jun_region` VALUES ('143', '10', '衡水', '2', 'HengShuiShi', '131100', '1', '冀T', null);
INSERT INTO `jun_region` VALUES ('144', '10', '廊坊', '2', 'LangFangShi', '131000', '1', '冀R', null);
INSERT INTO `jun_region` VALUES ('145', '10', '秦皇岛', '2', 'QinHuangDaoShi', '130300', '1', '冀C', null);
INSERT INTO `jun_region` VALUES ('146', '10', '唐山', '2', 'TangShanShi', '130200', '1', '冀B', null);
INSERT INTO `jun_region` VALUES ('147', '10', '邢台', '2', 'XingTaiShi', '130500', '1', '冀E', null);
INSERT INTO `jun_region` VALUES ('148', '10', '张家口', '2', 'ZhangJiaKouShi', '130700', '1', '冀G', null);
INSERT INTO `jun_region` VALUES ('149', '11', '郑州', '2', 'ZhengZhouShi', '410100', '1', '豫A', null);
INSERT INTO `jun_region` VALUES ('150', '11', '洛阳', '2', 'LuoYangShi', '410300', '1', '豫C', null);
INSERT INTO `jun_region` VALUES ('151', '11', '开封', '2', 'KaiFengShi', '410200', '1', '豫B', null);
INSERT INTO `jun_region` VALUES ('152', '11', '安阳', '2', 'AnYangShi', '410500', '1', '豫E', null);
INSERT INTO `jun_region` VALUES ('153', '11', '鹤壁', '2', 'HeBiShi', '410600', '1', '豫F', null);
INSERT INTO `jun_region` VALUES ('154', '11', '济源', '2', '', '419001', '1', '豫U', null);
INSERT INTO `jun_region` VALUES ('155', '11', '焦作', '2', 'JiaoZuoShi', '410800', '1', '豫H', null);
INSERT INTO `jun_region` VALUES ('156', '11', '南阳', '2', 'NanYangShi', '411300', '1', '豫R', null);
INSERT INTO `jun_region` VALUES ('157', '11', '平顶山', '2', 'PingDingShanShi', '410400', '1', '豫D', null);
INSERT INTO `jun_region` VALUES ('158', '11', '三门峡', '2', 'SanMenXiaShi', '411200', '1', '豫M', null);
INSERT INTO `jun_region` VALUES ('159', '11', '商丘', '2', 'ShangQiuShi', '411400', '1', '豫N', null);
INSERT INTO `jun_region` VALUES ('160', '11', '新乡', '2', 'XinXiangShi', '410700', '1', '豫G', null);
INSERT INTO `jun_region` VALUES ('161', '11', '信阳', '2', 'XinYangShi', '411500', '1', '豫S', null);
INSERT INTO `jun_region` VALUES ('162', '11', '许昌', '2', 'XuChangShi', '411000', '1', '豫K', null);
INSERT INTO `jun_region` VALUES ('163', '11', '周口', '2', 'ZhouKouShi', '411600', '1', '豫P', null);
INSERT INTO `jun_region` VALUES ('164', '11', '驻马店', '2', 'ZhuMaDianShi', '411700', '1', '豫Q', null);
INSERT INTO `jun_region` VALUES ('165', '11', '漯河', '2', 'LeiHeShi', '411100', '1', '豫L', null);
INSERT INTO `jun_region` VALUES ('166', '11', '濮阳', '2', 'PuYangShi', '410900', '1', '豫J', null);
INSERT INTO `jun_region` VALUES ('167', '12', '哈尔滨', '2', 'HaErBinShi', '230100', '1', '黑A', null);
INSERT INTO `jun_region` VALUES ('168', '12', '大庆', '2', 'DaQingShi', '230600', '1', '黑E', null);
INSERT INTO `jun_region` VALUES ('169', '12', '大兴安岭', '2', '', '232700', '1', '黑P', null);
INSERT INTO `jun_region` VALUES ('170', '12', '鹤岗', '2', 'HeGangShi', '230400', '1', '黑H', null);
INSERT INTO `jun_region` VALUES ('171', '12', '黑河', '2', 'HeiHeShi', '231100', '1', '黑N', null);
INSERT INTO `jun_region` VALUES ('172', '12', '鸡西', '2', 'JiXiShi', '230300', '1', '黑G', null);
INSERT INTO `jun_region` VALUES ('173', '12', '佳木斯', '2', 'JiaMuSiShi', '230800', '1', '黑D', null);
INSERT INTO `jun_region` VALUES ('174', '12', '牡丹江', '2', 'MuDanJiangShi', '231000', '1', '黑C', null);
INSERT INTO `jun_region` VALUES ('175', '12', '七台河', '2', 'QiTaiHeShi', '230900', '1', '黑K', null);
INSERT INTO `jun_region` VALUES ('176', '12', '齐齐哈尔', '2', 'QiQiHaErShi', '230200', '1', '黑B', null);
INSERT INTO `jun_region` VALUES ('177', '12', '双鸭山', '2', 'ShuangYaShanShi', '230500', '1', '黑J', null);
INSERT INTO `jun_region` VALUES ('178', '12', '绥化', '2', 'SuiHuaShi', '231200', '1', '黑M', null);
INSERT INTO `jun_region` VALUES ('179', '12', '伊春', '2', 'YiChunShi', '230700', '1', '黑F', null);
INSERT INTO `jun_region` VALUES ('180', '13', '武汉', '2', 'WuHanShi', '420100', '1', '鄂A', null);
INSERT INTO `jun_region` VALUES ('181', '13', '仙桃', '2', 'XianTaoShi', '429004', '1', '鄂M', null);
INSERT INTO `jun_region` VALUES ('182', '13', '鄂州', '2', 'EZhouShi', '420700', '1', '鄂G', null);
INSERT INTO `jun_region` VALUES ('183', '13', '黄冈', '2', 'HuangGangShi', '421100', '1', '鄂J', null);
INSERT INTO `jun_region` VALUES ('184', '13', '黄石', '2', 'HuangShiShi', '420200', '1', '鄂B', null);
INSERT INTO `jun_region` VALUES ('185', '13', '荆门', '2', 'JingMenShi', '420800', '1', '鄂H', null);
INSERT INTO `jun_region` VALUES ('186', '13', '荆州', '2', 'JingZhouShi', '421000', '1', '鄂D', null);
INSERT INTO `jun_region` VALUES ('187', '13', '潜江', '2', 'QianJiangShi', '429005', '1', '鄂N', null);
INSERT INTO `jun_region` VALUES ('188', '13', '神农架林区', '2', 'ShenNongJiaLinQu', '429021', '1', '鄂P', null);
INSERT INTO `jun_region` VALUES ('189', '13', '十堰', '2', 'ShiYanShi', '420300', '1', '鄂C', null);
INSERT INTO `jun_region` VALUES ('190', '13', '随州', '2', 'SuiZhouShi', '421300', '1', '鄂S', null);
INSERT INTO `jun_region` VALUES ('191', '13', '天门', '2', 'TianMenShi', '429006', '1', '鄂R', null);
INSERT INTO `jun_region` VALUES ('192', '13', '咸宁', '2', 'XianNingShi', '421200', '1', '鄂L', null);
INSERT INTO `jun_region` VALUES ('193', '13', '襄阳', '2', 'XiangYangShi', '420600', '1', '鄂F', null);
INSERT INTO `jun_region` VALUES ('194', '13', '孝感', '2', 'XiaoGanShi', '420900', '1', '鄂K', null);
INSERT INTO `jun_region` VALUES ('195', '13', '宜昌', '2', 'YiChangShi', '420500', '1', '鄂E', null);
INSERT INTO `jun_region` VALUES ('196', '13', '恩施', '2', '', '422800', '1', '鄂Q', null);
INSERT INTO `jun_region` VALUES ('197', '14', '长沙', '2', 'ChangShaShi', '430100', '1', '湘A', null);
INSERT INTO `jun_region` VALUES ('198', '14', '张家界', '2', 'ZhangJiaJieShi', '430800', '1', '湘G', null);
INSERT INTO `jun_region` VALUES ('199', '14', '常德', '2', 'ChangDeShi', '430700', '1', '湘J', null);
INSERT INTO `jun_region` VALUES ('200', '14', '郴州', '2', 'ChenZhouShi', '431000', '1', '湘L', null);
INSERT INTO `jun_region` VALUES ('201', '14', '衡阳', '2', 'HengYangShi', '430400', '1', '湘D', null);
INSERT INTO `jun_region` VALUES ('202', '14', '怀化', '2', 'HuaiHuaShi', '431200', '1', '湘N', null);
INSERT INTO `jun_region` VALUES ('203', '14', '娄底', '2', 'LouDiShi', '431300', '1', '湘K', null);
INSERT INTO `jun_region` VALUES ('204', '14', '邵阳', '2', 'ShaoYangShi', '430500', '1', '湘E', null);
INSERT INTO `jun_region` VALUES ('205', '14', '湘潭', '2', 'XiangTanShi', '430300', '1', '湘C', null);
INSERT INTO `jun_region` VALUES ('206', '14', '湘西', '2', '', '433100', '1', '湘U', null);
INSERT INTO `jun_region` VALUES ('207', '14', '益阳', '2', 'YiYangShi', '430900', '1', '湘H', null);
INSERT INTO `jun_region` VALUES ('208', '14', '永州', '2', 'YongZhouShi', '431100', '1', '湘M', null);
INSERT INTO `jun_region` VALUES ('209', '14', '岳阳', '2', 'YueYangShi', '430600', '1', '湘F', null);
INSERT INTO `jun_region` VALUES ('210', '14', '株洲', '2', 'ZhuZhouShi', '430200', '1', '湘B', null);
INSERT INTO `jun_region` VALUES ('211', '15', '长春', '2', 'ChangChunShi', '220100', '1', '吉A', null);
INSERT INTO `jun_region` VALUES ('212', '15', '吉林', '2', 'JiLinShi', '220200', '1', '吉B', null);
INSERT INTO `jun_region` VALUES ('213', '15', '白城', '2', 'BaiChengShi', '220800', '1', '吉G', null);
INSERT INTO `jun_region` VALUES ('214', '15', '白山', '2', 'BaiShanShi', '220600', '1', '吉F', null);
INSERT INTO `jun_region` VALUES ('215', '15', '辽源', '2', 'LiaoYuanShi', '220400', '1', '吉D', null);
INSERT INTO `jun_region` VALUES ('216', '15', '四平', '2', 'SiPingShi', '220300', '1', '吉C', null);
INSERT INTO `jun_region` VALUES ('217', '15', '松原', '2', 'SongYuanShi', '220700', '1', '吉J', null);
INSERT INTO `jun_region` VALUES ('218', '15', '通化', '2', 'TongHuaShi', '220500', '1', '吉E', null);
INSERT INTO `jun_region` VALUES ('219', '15', '延边', '2', '', '222400', '1', '吉H', null);
INSERT INTO `jun_region` VALUES ('220', '16', '南京', '2', 'NanJingShi', '320100', '1', '苏A', null);
INSERT INTO `jun_region` VALUES ('221', '16', '苏州', '2', 'SuZhouShi', '320500', '1', '苏E', null);
INSERT INTO `jun_region` VALUES ('222', '16', '无锡', '2', 'WuXiShi', '320200', '1', '苏B', null);
INSERT INTO `jun_region` VALUES ('223', '16', '常州', '2', 'ChangZhouShi', '320400', '1', '苏D', null);
INSERT INTO `jun_region` VALUES ('224', '16', '淮安', '2', 'HuaiAnShi', '320800', '1', '苏H', null);
INSERT INTO `jun_region` VALUES ('225', '16', '连云港', '2', 'LianYunGangShi', '320700', '1', '苏G', null);
INSERT INTO `jun_region` VALUES ('226', '16', '南通', '2', 'NanTongShi', '320600', '1', '苏F', null);
INSERT INTO `jun_region` VALUES ('227', '16', '宿迁', '2', 'SuQianShi', '321300', '1', '苏N', null);
INSERT INTO `jun_region` VALUES ('228', '16', '泰州', '2', 'TaiZhouShi', '321200', '1', '苏M', null);
INSERT INTO `jun_region` VALUES ('229', '16', '徐州', '2', 'XuZhouShi', '320300', '1', '苏C', null);
INSERT INTO `jun_region` VALUES ('230', '16', '盐城', '2', 'YanChengShi', '320900', '1', '苏J', null);
INSERT INTO `jun_region` VALUES ('231', '16', '扬州', '2', 'YangZhouShi', '321000', '1', '苏K', null);
INSERT INTO `jun_region` VALUES ('232', '16', '镇江', '2', 'ZhenJiangShi', '321100', '1', '苏L', null);
INSERT INTO `jun_region` VALUES ('233', '17', '南昌', '2', 'NanChangShi', '360100', '1', '赣A', null);
INSERT INTO `jun_region` VALUES ('234', '17', '抚州', '2', 'FuZhouShi', '361000', '1', '赣F', null);
INSERT INTO `jun_region` VALUES ('235', '17', '赣州', '2', 'GanZhouShi', '360700', '1', '赣B', null);
INSERT INTO `jun_region` VALUES ('236', '17', '吉安', '2', 'JiAnShi', '360800', '1', '赣D', null);
INSERT INTO `jun_region` VALUES ('237', '17', '景德镇', '2', 'JingDeZhenShi', '360200', '1', '赣H', null);
INSERT INTO `jun_region` VALUES ('238', '17', '九江', '2', 'JiuJiangShi', '360400', '1', '赣G', null);
INSERT INTO `jun_region` VALUES ('239', '17', '萍乡', '2', 'PingXiangShi', '360300', '1', '赣J', null);
INSERT INTO `jun_region` VALUES ('240', '17', '上饶', '2', 'ShangRaoShi', '361100', '1', '赣E', null);
INSERT INTO `jun_region` VALUES ('241', '17', '新余', '2', 'XinYuShi', '360500', '1', '赣K', null);
INSERT INTO `jun_region` VALUES ('242', '17', '宜春', '2', 'YiChunShi', '360900', '1', '赣C', null);
INSERT INTO `jun_region` VALUES ('243', '17', '鹰潭', '2', 'YingTanShi', '360600', '1', '赣L', null);
INSERT INTO `jun_region` VALUES ('244', '18', '沈阳', '2', 'ShenYangShi', '210100', '1', '辽A', null);
INSERT INTO `jun_region` VALUES ('245', '18', '大连', '2', 'DaLianShi', '210200', '1', '辽B', null);
INSERT INTO `jun_region` VALUES ('246', '18', '鞍山', '2', 'AnShanShi', '210300', '1', '辽C', null);
INSERT INTO `jun_region` VALUES ('247', '18', '本溪', '2', 'BenXiShi', '210500', '1', '辽E', null);
INSERT INTO `jun_region` VALUES ('248', '18', '朝阳', '2', 'ChaoYangShi', '211300', '1', '辽N', null);
INSERT INTO `jun_region` VALUES ('249', '18', '丹东', '2', 'DanDongShi', '210600', '1', '辽F', null);
INSERT INTO `jun_region` VALUES ('250', '18', '抚顺', '2', 'FuShunShi', '210400', '1', '辽D', null);
INSERT INTO `jun_region` VALUES ('251', '18', '阜新', '2', 'FuXinShi', '210900', '1', '辽J', null);
INSERT INTO `jun_region` VALUES ('252', '18', '葫芦岛', '2', 'HuLuDaoShi', '211400', '1', '辽P', null);
INSERT INTO `jun_region` VALUES ('253', '18', '锦州', '2', 'JinZhouShi', '210700', '1', '辽G', null);
INSERT INTO `jun_region` VALUES ('254', '18', '辽阳', '2', 'LiaoYangShi', '211000', '1', '辽K', null);
INSERT INTO `jun_region` VALUES ('255', '18', '盘锦', '2', 'PanJinShi', '211100', '1', '辽L', null);
INSERT INTO `jun_region` VALUES ('256', '18', '铁岭', '2', 'TieLingShi', '211200', '1', '辽M', null);
INSERT INTO `jun_region` VALUES ('257', '18', '营口', '2', 'YingKouShi', '210800', '1', '辽H', null);
INSERT INTO `jun_region` VALUES ('258', '19', '呼和浩特', '2', 'HuHeHaoTeShi', '150100', '1', '蒙A', null);
INSERT INTO `jun_region` VALUES ('259', '19', '阿拉善盟', '2', 'ALaShanMeng', '152900', '1', '蒙M　', null);
INSERT INTO `jun_region` VALUES ('260', '19', '巴彦淖尔市', '2', '', '150800', '1', '蒙K', null);
INSERT INTO `jun_region` VALUES ('261', '19', '包头', '2', 'BaoTouShi', '150200', '1', '蒙B', null);
INSERT INTO `jun_region` VALUES ('262', '19', '赤峰', '2', 'ChiFengShi', '150400', '1', '蒙D', null);
INSERT INTO `jun_region` VALUES ('263', '19', '鄂尔多斯', '2', 'EErDuoSiShi', '150600', '1', '蒙K', null);
INSERT INTO `jun_region` VALUES ('264', '19', '呼伦贝尔', '2', 'HuLunBeiErShi', '150700', '1', '蒙E', null);
INSERT INTO `jun_region` VALUES ('265', '19', '通辽', '2', 'TongLiaoShi', '150500', '1', '蒙G', null);
INSERT INTO `jun_region` VALUES ('266', '19', '乌海', '2', 'WuHaiShi', '150300', '1', '蒙C', null);
INSERT INTO `jun_region` VALUES ('267', '19', '乌兰察布', '2', '', '150900', '1', '蒙J', null);
INSERT INTO `jun_region` VALUES ('268', '19', '锡林郭勒盟', '2', 'XiLinGuoLeMeng', '152500', '1', '蒙H', null);
INSERT INTO `jun_region` VALUES ('269', '19', '兴安盟', '2', 'XingAnMeng', '152200', '1', '蒙F', null);
INSERT INTO `jun_region` VALUES ('270', '20', '银川', '2', 'YinChuanShi', '640100', '1', '宁A', null);
INSERT INTO `jun_region` VALUES ('271', '20', '固原', '2', 'GuYuanShi', '640400', '1', '宁D', null);
INSERT INTO `jun_region` VALUES ('272', '20', '石嘴山', '2', 'ShiZuiShanShi', '640200', '1', '宁B', null);
INSERT INTO `jun_region` VALUES ('273', '20', '吴忠', '2', 'WuZhongShi', '640300', '1', '宁C', null);
INSERT INTO `jun_region` VALUES ('274', '20', '中卫', '2', 'ZhongWeiShi', '640500', '1', '宁E', null);
INSERT INTO `jun_region` VALUES ('275', '21', '西宁', '2', 'XiNingShi', '630100', '1', '青A', null);
INSERT INTO `jun_region` VALUES ('276', '21', '果洛', '2', '', '632600', '1', '青F', null);
INSERT INTO `jun_region` VALUES ('277', '21', '海北', '2', '', '632200', '1', '青C', null);
INSERT INTO `jun_region` VALUES ('278', '21', '海东', '2', '', '630200', '1', '青B', null);
INSERT INTO `jun_region` VALUES ('279', '21', '海南', '2', 'HaiNanZhou', '632500', '1', '青E', null);
INSERT INTO `jun_region` VALUES ('280', '21', '海西', '2', '', '632800', '1', '青H', null);
INSERT INTO `jun_region` VALUES ('281', '21', '黄南', '2', '', '632300', '1', '青D', null);
INSERT INTO `jun_region` VALUES ('282', '21', '玉树', '2', '', '632700', '1', '青G', null);
INSERT INTO `jun_region` VALUES ('283', '22', '济南', '2', 'JiNanShi', '370100', '1', '鲁A ', null);
INSERT INTO `jun_region` VALUES ('284', '22', '青岛', '2', 'QingDaoShi', '370200', '1', '鲁B', null);
INSERT INTO `jun_region` VALUES ('285', '22', '滨州', '2', 'BinZhouShi', '371600', '1', '鲁M', null);
INSERT INTO `jun_region` VALUES ('286', '22', '德州', '2', 'DeZhouShi', '371400', '1', '鲁N', null);
INSERT INTO `jun_region` VALUES ('287', '22', '东营', '2', 'DongYingShi', '370500', '1', '鲁E', null);
INSERT INTO `jun_region` VALUES ('288', '22', '菏泽', '2', 'HeZeShi', '371700', '1', '鲁R', null);
INSERT INTO `jun_region` VALUES ('289', '22', '济宁', '2', 'JiNingShi', '370800', '1', '鲁H', null);
INSERT INTO `jun_region` VALUES ('290', '22', '莱芜', '2', 'LaiWuShi', '371200', '1', '鲁S', null);
INSERT INTO `jun_region` VALUES ('291', '22', '聊城', '2', 'LiaoChengShi', '371500', '1', '鲁P', null);
INSERT INTO `jun_region` VALUES ('292', '22', '临沂', '2', 'LinYiShi', '371300', '1', '鲁Q', null);
INSERT INTO `jun_region` VALUES ('293', '22', '日照', '2', 'RiZhaoShi', '371100', '1', '鲁L', null);
INSERT INTO `jun_region` VALUES ('294', '22', '泰安', '2', 'TaiAnShi', '370900', '1', '鲁J', null);
INSERT INTO `jun_region` VALUES ('295', '22', '威海', '2', 'WeiHaiShi', '371000', '1', '鲁K', null);
INSERT INTO `jun_region` VALUES ('296', '22', '潍坊', '2', 'WeiFangShi', '370700', '1', '鲁G', null);
INSERT INTO `jun_region` VALUES ('297', '22', '烟台', '2', 'YanTaiShi', '370600', '1', '鲁F', null);
INSERT INTO `jun_region` VALUES ('298', '22', '枣庄', '2', 'ZaoZhuangShi', '370400', '1', '鲁D', null);
INSERT INTO `jun_region` VALUES ('299', '22', '淄博', '2', 'ZiBoShi', '370300', '1', '鲁C', null);
INSERT INTO `jun_region` VALUES ('300', '23', '太原', '2', 'TaiYuanShi', '140100', '1', '晋A', null);
INSERT INTO `jun_region` VALUES ('301', '23', '长治', '2', 'ChangZhiShi', '140400', '1', '晋D', null);
INSERT INTO `jun_region` VALUES ('302', '23', '大同', '2', 'DaTongShi', '140200', '1', '晋B', null);
INSERT INTO `jun_region` VALUES ('303', '23', '晋城', '2', 'JinChengShi', '140500', '1', '晋E', null);
INSERT INTO `jun_region` VALUES ('304', '23', '晋中', '2', 'JinZhongShi', '140700', '1', '晋K', null);
INSERT INTO `jun_region` VALUES ('305', '23', '临汾', '2', 'LinFenShi', '141000', '1', '晋L', null);
INSERT INTO `jun_region` VALUES ('306', '23', '吕梁', '2', 'LvLiangShi', '141100', '1', '晋J', null);
INSERT INTO `jun_region` VALUES ('307', '23', '朔州', '2', 'ShuoZhouShi', '140600', '1', '晋F', null);
INSERT INTO `jun_region` VALUES ('308', '23', '忻州', '2', 'XinZhouShi', '140900', '1', '晋H', null);
INSERT INTO `jun_region` VALUES ('309', '23', '阳泉', '2', 'YangQuanShi', '140300', '1', '晋C', null);
INSERT INTO `jun_region` VALUES ('310', '23', '运城', '2', 'YunChengShi', '140800', '1', '晋M', null);
INSERT INTO `jun_region` VALUES ('311', '24', '西安', '2', 'XiAnShi', '610100', '1', '陕A', null);
INSERT INTO `jun_region` VALUES ('312', '24', '安康', '2', 'AnKangShi', '610900', '1', '陕G', null);
INSERT INTO `jun_region` VALUES ('313', '24', '宝鸡', '2', 'BaoJiShi', '610300', '1', '陕C', null);
INSERT INTO `jun_region` VALUES ('314', '24', '汉中', '2', 'HanZhongShi', '610700', '1', '陕F', null);
INSERT INTO `jun_region` VALUES ('315', '24', '商洛', '2', 'ShangLuoShi', '611000', '1', '陕H', null);
INSERT INTO `jun_region` VALUES ('316', '24', '铜川', '2', 'TongChuanShi', '610200', '1', '陕B', null);
INSERT INTO `jun_region` VALUES ('317', '24', '渭南', '2', 'WeiNanShi', '610500', '1', '陕E', null);
INSERT INTO `jun_region` VALUES ('318', '24', '咸阳', '2', 'XianYangShi', '610400', '1', '陕D', null);
INSERT INTO `jun_region` VALUES ('319', '24', '延安', '2', 'YanAnShi', '610600', '1', '陕J', null);
INSERT INTO `jun_region` VALUES ('320', '24', '榆林', '2', 'YuLinShi', '610800', '1', '陕K', null);
INSERT INTO `jun_region` VALUES ('321', '25', '上海', '2', '', '310100', '1', '沪A', null);
INSERT INTO `jun_region` VALUES ('322', '26', '成都', '2', 'ChengDuShi', '510100', '1', '川A', null);
INSERT INTO `jun_region` VALUES ('323', '26', '绵阳', '2', 'MianYangShi', '510700', '1', '川B', null);
INSERT INTO `jun_region` VALUES ('324', '26', '阿坝', '2', '', '513200', '1', '川U', null);
INSERT INTO `jun_region` VALUES ('325', '26', '巴中', '2', 'BaZhongShi', '511900', '1', '川Y', null);
INSERT INTO `jun_region` VALUES ('326', '26', '达州', '2', 'DaZhouShi', '511700', '1', '川S', null);
INSERT INTO `jun_region` VALUES ('327', '26', '德阳', '2', 'DeYangShi', '510600', '1', '川F', null);
INSERT INTO `jun_region` VALUES ('328', '26', '甘孜', '2', '', '513300', '1', '川V', null);
INSERT INTO `jun_region` VALUES ('329', '26', '广安', '2', 'GuangAnShi', '511600', '1', '川X', null);
INSERT INTO `jun_region` VALUES ('330', '26', '广元', '2', 'GuangYuanShi', '510800', '1', '川H', null);
INSERT INTO `jun_region` VALUES ('331', '26', '乐山', '2', 'LeShanShi', '511100', '1', '川L', null);
INSERT INTO `jun_region` VALUES ('332', '26', '凉山', '2', '', '513400', '1', '川W', null);
INSERT INTO `jun_region` VALUES ('333', '26', '眉山', '2', 'MeiShanShi', '511400', '1', '川Z', null);
INSERT INTO `jun_region` VALUES ('334', '26', '南充', '2', 'NanChongShi', '511300', '1', '川R', null);
INSERT INTO `jun_region` VALUES ('335', '26', '内江', '2', 'NaJiangShi', '511000', '1', '川K', null);
INSERT INTO `jun_region` VALUES ('336', '26', '攀枝花', '2', 'PanZhiHuaShi', '510400', '1', '川D', null);
INSERT INTO `jun_region` VALUES ('337', '26', '遂宁', '2', 'SuiNingShi', '510900', '1', '川J', null);
INSERT INTO `jun_region` VALUES ('338', '26', '雅安', '2', 'YaAnShi', '511800', '1', '川T', null);
INSERT INTO `jun_region` VALUES ('339', '26', '宜宾', '2', 'YiBinShi', '511500', '1', '川Q', null);
INSERT INTO `jun_region` VALUES ('340', '26', '资阳', '2', 'ZiYangShi', '512000', '1', '川M', null);
INSERT INTO `jun_region` VALUES ('341', '26', '自贡', '2', 'ZiGongShi', '510300', '1', '川C', null);
INSERT INTO `jun_region` VALUES ('342', '26', '泸州', '2', 'LuZhouShi', '510500', '1', '川E', null);
INSERT INTO `jun_region` VALUES ('343', '27', '天津', '2', '', '120100', '1', '津A', null);
INSERT INTO `jun_region` VALUES ('344', '28', '拉萨', '2', 'LaSaShi', '540100', '1', '藏A', null);
INSERT INTO `jun_region` VALUES ('345', '28', '阿里', '2', '', '542500', '1', '藏F', null);
INSERT INTO `jun_region` VALUES ('346', '28', '昌都', '2', '', '542100', '1', '藏B', null);
INSERT INTO `jun_region` VALUES ('347', '28', '林芝', '2', '', '542600', '1', '藏G', null);
INSERT INTO `jun_region` VALUES ('348', '28', '那曲', '2', '', '542400', '1', '藏E', null);
INSERT INTO `jun_region` VALUES ('349', '28', '日喀则', '2', '', '542300', '1', '藏D', null);
INSERT INTO `jun_region` VALUES ('350', '28', '山南', '2', '', '542200', '1', '藏C', null);
INSERT INTO `jun_region` VALUES ('351', '29', '乌鲁木齐', '2', 'WuLuMuQiShi', '650100', '1', '新A', null);
INSERT INTO `jun_region` VALUES ('352', '29', '阿克苏', '2', '', '652900', '1', '新N', null);
INSERT INTO `jun_region` VALUES ('354', '29', '巴音郭楞', '2', '', '652800', '1', '新M', null);
INSERT INTO `jun_region` VALUES ('355', '29', '博尔塔拉', '2', '', '652700', '1', '新E', null);
INSERT INTO `jun_region` VALUES ('356', '29', '昌吉', '2', '', '652300', '1', '新B', null);
INSERT INTO `jun_region` VALUES ('357', '29', '哈密', '2', '', '652200', '1', '新L', null);
INSERT INTO `jun_region` VALUES ('358', '29', '和田', '2', '', '653200', '1', '新R', null);
INSERT INTO `jun_region` VALUES ('359', '29', '喀什', '2', '', '653100', '1', '新Q', null);
INSERT INTO `jun_region` VALUES ('360', '29', '克拉玛依', '2', 'KeLaMaYiShi', '650200', '1', '新J', null);
INSERT INTO `jun_region` VALUES ('361', '29', '克孜勒苏', '2', '', '653000', '1', '新P', null);
INSERT INTO `jun_region` VALUES ('3430', '29', '阿勒泰', '2', '', '654301', '0', '新H', null);
INSERT INTO `jun_region` VALUES ('364', '29', '吐鲁番', '2', '', '650400', '1', '新K', null);
INSERT INTO `jun_region` VALUES ('366', '29', '伊犁', '2', '', '654000', '1', '新F', null);
INSERT INTO `jun_region` VALUES ('367', '30', '昆明', '2', 'KunMingShi', '530100', '1', '云A', null);
INSERT INTO `jun_region` VALUES ('368', '30', '怒江', '2', '', '533300', '1', '云Q', null);
INSERT INTO `jun_region` VALUES ('369', '30', '普洱', '2', 'PuErShi', '530800', '1', '云J', null);
INSERT INTO `jun_region` VALUES ('370', '30', '丽江', '2', 'LiJiangShi', '530700', '1', '云P', null);
INSERT INTO `jun_region` VALUES ('371', '30', '保山', '2', 'BaoShanShi', '530500', '1', '云M', null);
INSERT INTO `jun_region` VALUES ('372', '30', '楚雄', '2', '', '532300', '1', '云E', null);
INSERT INTO `jun_region` VALUES ('373', '30', '大理', '2', '', '532900', '1', '云L', null);
INSERT INTO `jun_region` VALUES ('374', '30', '德宏', '2', '', '533100', '1', '云N', null);
INSERT INTO `jun_region` VALUES ('375', '30', '迪庆', '2', '', '533400', '1', '云R', null);
INSERT INTO `jun_region` VALUES ('376', '30', '红河', '2', '', '532500', '1', '云G', null);
INSERT INTO `jun_region` VALUES ('377', '30', '临沧', '2', 'LinCangShi', '530900', '1', '云S', null);
INSERT INTO `jun_region` VALUES ('378', '30', '曲靖', '2', 'QuJingShi', '530300', '1', '云D', null);
INSERT INTO `jun_region` VALUES ('379', '30', '文山壮族苗族自治州', '2', '', '532600', '1', '云H', null);
INSERT INTO `jun_region` VALUES ('380', '30', '西双版纳', '2', 'XiShuangBanNaZhou', '532800', '1', '云K', null);
INSERT INTO `jun_region` VALUES ('381', '30', '玉溪', '2', 'YuXiShi', '530400', '1', '云F', null);
INSERT INTO `jun_region` VALUES ('382', '30', '昭通', '2', 'ZhaoTongShi', '530600', '1', '云C', null);
INSERT INTO `jun_region` VALUES ('383', '31', '杭州', '2', 'HangZhouShi', '330100', '1', '浙A', null);
INSERT INTO `jun_region` VALUES ('384', '31', '湖州', '2', 'HuZhouShi', '330500', '1', '浙E', null);
INSERT INTO `jun_region` VALUES ('385', '31', '嘉兴', '2', 'JiaXingShi', '330400', '1', '浙F', null);
INSERT INTO `jun_region` VALUES ('386', '31', '金华', '2', 'JinHuaShi', '330700', '1', '浙G', null);
INSERT INTO `jun_region` VALUES ('387', '31', '丽水', '2', 'LiShuiShi', '331100', '1', '浙K', null);
INSERT INTO `jun_region` VALUES ('388', '31', '宁波', '2', 'NingBoShi', '330200', '1', '浙B', null);
INSERT INTO `jun_region` VALUES ('389', '31', '绍兴', '2', 'ShaoXingShi', '330600', '1', '浙D', null);
INSERT INTO `jun_region` VALUES ('390', '31', '台州', '2', 'TaiZhouShi', '331000', '1', '浙J', null);
INSERT INTO `jun_region` VALUES ('391', '31', '温州', '2', 'WenZhouShi', '330300', '1', '浙C', null);
INSERT INTO `jun_region` VALUES ('392', '31', '舟山', '2', 'ZhouShanShi', '330900', '1', '浙L', null);
INSERT INTO `jun_region` VALUES ('393', '31', '衢州', '2', 'QuZhouShi', '330800', '1', '浙H', null);
INSERT INTO `jun_region` VALUES ('394', '32', '重庆', '2', '', '500100', '1', '渝A', null);
INSERT INTO `jun_region` VALUES ('3401', '3', '合肥', '2', 'HeFeiShi', '340100', '1', '皖A', null);
INSERT INTO `jun_region` VALUES ('3414', '2', '北京', '2', '', '110100', '1', '京A', null);
INSERT INTO `jun_region` VALUES ('3416', '9', '三沙', '2', '', '460300', '1', null, null);
INSERT INTO `jun_region` VALUES ('3420', '9', '省辖县', '2', '', '469000', '1', null, null);
INSERT INTO `jun_region` VALUES ('3429', '29', '塔城', '2', '', '654200', '1', '新G', null);

-- ----------------------------
-- Table structure for jun_role
-- ----------------------------
DROP TABLE IF EXISTS `jun_role`;
CREATE TABLE `jun_role` (
  `r_id` int(11) NOT NULL AUTO_INCREMENT,
  `r_name` varchar(20) DEFAULT NULL COMMENT '角色名称',
  `r_remark` varchar(100) DEFAULT NULL COMMENT '备注',
  `r_status` tinyint(1) DEFAULT '1' COMMENT '状态：1开启， 2关闭',
  `r_menu_list` text,
  PRIMARY KEY (`r_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of jun_role
-- ----------------------------
INSERT INTO `jun_role` VALUES ('1', '无', null, '1', null);
INSERT INTO `jun_role` VALUES ('2', '完全权限', '', '1', '2,8,9,13,14,23,24,25,28,29,33,37,38,39,40,43,44,67,68,132,47,48,49,50,51,52,53,54,55,57,56,58,59,60,61,62,63,64,65,127,128,129,130,137,138,142,143');
INSERT INTO `jun_role` VALUES ('3', '组织架构-基础列表', '', '1', '1,2,3,8,13,18');

-- ----------------------------
-- Table structure for jun_structure
-- ----------------------------
DROP TABLE IF EXISTS `jun_structure`;
CREATE TABLE `jun_structure` (
  `s_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'ID',
  `s_name` varchar(30) NOT NULL COMMENT '组织名称',
  `s_pid` char(13) NOT NULL DEFAULT '0' COMMENT '父ID',
  `s_sort` int(11) DEFAULT '0' COMMENT '排序',
  `s_code` varchar(20) DEFAULT NULL COMMENT '部门编码，唯一',
  `s_remark` varchar(255) DEFAULT NULL COMMENT '备注',
  `add_time` int(5) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `r_id` int(11) DEFAULT NULL COMMENT '角色ID',
  PRIMARY KEY (`s_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COMMENT='组织表';

-- ----------------------------
-- Records of jun_structure
-- ----------------------------
INSERT INTO `jun_structure` VALUES ('1', '总部', '0', '0', '00001', '', '1514881292', '1');
INSERT INTO `jun_structure` VALUES ('2', '财务部', '1', '0', '00002', '', '1514881356', '1');
INSERT INTO `jun_structure` VALUES ('3', '采购部', '1', '0', '00003', '', '1514881369', '1');
INSERT INTO `jun_structure` VALUES ('4', '客服部', '1', '0', '00004', '', '1514881418', '1');
INSERT INTO `jun_structure` VALUES ('5', '行政部', '1', '0', '00005', '', '1514881496', '1');
INSERT INTO `jun_structure` VALUES ('6', '市场部', '1', '0', '00006', '', '1514881520', '1');
INSERT INTO `jun_structure` VALUES ('7', '商务部', '1', '0', '00007', '', '1514881535', '1');
INSERT INTO `jun_structure` VALUES ('8', '网络推广部', '1', '0', '00008', '', '1514882812', '1');

-- ----------------------------
-- Table structure for jun_weixin_reply
-- ----------------------------
DROP TABLE IF EXISTS `jun_weixin_reply`;
CREATE TABLE `jun_weixin_reply` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) DEFAULT NULL COMMENT '关键词',
  `content` text COMMENT '回复内容',
  `rates` int(11) DEFAULT '0' COMMENT '曝光数',
  `time` int(10) DEFAULT NULL COMMENT '添加时间',
  `status` tinyint(1) DEFAULT '1' COMMENT '启用状态 0|1 关闭|开启',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='微信自动回复表';

-- ----------------------------
-- Records of jun_weixin_reply
-- ----------------------------
