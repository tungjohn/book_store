<?php

/**
 * @Project NUKEVIET 4.x
 * @Author VINADES.,JSC (contact@vinades.vn)
 * @Copyright (C) 2014 VINADES.,JSC. All rights reserved
 * @License GNU/GPL version 2 or any later version
 * @Createdate 2-10-2010 20:59
 */

if (!defined('NV_ADMIN')) {
    die('Stop!!!');
}

/**
 * Note:
 * 	- Module var is: $lang, $module_file, $module_data, $module_upload, $module_theme, $module_name
 * 	- Accept global var: $db, $db_config, $global_config
 */

if ($module_name == 'siteterms') {
    $sth = $db->prepare("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (id, title, alias, image, imagealt, description, bodytext, keywords, socialbutton, activecomm, layout_func, weight, admin_id, add_time, edit_time, status)
		VALUES (1, 'Terms & Conditions', 'Terms-Conditions', '', '', '', :bodytext, '', 0, 4, '', 1, 1, " . NV_CURRENTTIME . ", " . NV_CURRENTTIME . ", 1)");
    $bodytext = '<h2><strong>Term no</strong><strong> 1: Collect information</strong></h2><strong>1.1. Collecting information automatically.</strong><br />Like the other modern websites, Websites will collect IP address and some information of the standard website like: browser, pages that you access to websites for process using services by desktop, laptop, computer and network devices, etc. It aims to analyze information for privacy and keeping safe mode the system.<br /><strong>1.2. Collecting your information through an account.</strong><br />All information of your account (creating a new account, contacting to us, and so on) will be stored in profile for caring customer services later.<br /><strong>1.3. Collecting information through setting up cookies.</strong><br />Like the other modern websites, when you access to websites, we (or monitoring tools; or the statistics of website activities that provided by partners ) will create some profiles that named Cookies on hard-disk or memory of your computer. One of some Cookies may be exist with the long time to become convenient process using. For example, saving your email in login page to avoid login again, ect.<br /><strong>1.4. Collecting and storing information in the last.</strong><h3>You can change the private information any time, however, we will save in all information that changed to prevent the erase traces of illegal activities.</h3><h2><br /><strong>Term no</strong><strong> 2: Storing and protecting information.</strong></h2>Almost collected information will be stored in us database system.<br />We protect personal information by using some tools as password, firewall, encryption, and with some other tools that is license for accessing and suitable for data management process. For example, you and staffs must be responsibility for information processing through identifying steps in private information.<h2><br /><strong>Term no</strong><strong> 3: Using information</strong></h2>Collected information will be used to:<ul>	<li>Supplying support services &amp; customer care.</li>	<li>Transaction payment and Payment Notifications will send when a new payment is created</li>	<li>Handling complaints, charges &amp; Troubleshooting.</li>	<li>Stopping any forbidden or illegal act and must guarantee to follow the policies in &quot;User agreement”</li>	<li><a name="_GoBack"></a> Measurement, upgrading &amp; improving services, content and form of the website.</li>	<li>Sending information to user about Marketing&#039;s Programs, announcements and promotional programs.</li>	<li>Comparison of the accuracy of your personal information in the process of checking with third parties.</li></ul><h2><br /><strong>Term no 4: Receiving information from partners</strong></h2>When using payment and transactions tools via the internet, we can receive more information about you such as your username address, email, bank account number ... We check that information with our user database to confirm whether you are the customer of us or not in order to enable the implementation of the service is convenient for you.<br />The received information will be secured as the information that we collected directly from you.<h2><br /><strong>Term no 5: Sharing information with the third party</strong></h2>We will not share your personal information, financial information... for the 3rd party, unless we have your consent or when we are forced to comply with the law or in case of having the requests from government agencies having jurisdiction.<h2><br /><strong>Term no 6: Changing the privacy policy</strong></h2>This Privacy Policy may change from time to time. We will not reduce your rights under this Privacy Policy without your explicit consent. We will post any changes to this Privacy Policy on this website and if the changes are significant, we will provide a more prominent notice (including information email message about the change of the Privacy Policy for certain services).<br /><br />&nbsp;<div style="text-align: right;">Tham khảo từ website <a href="http://webnhanh.vn/vi/thiet-ke-web/detail/Chinh-sach-bao-mat-Quyen-rieng-tu-Privacy-Policy-2147/">webnhanh.vn</a><br />&nbsp;</div>';
    $sth->bindParam(':bodytext', $bodytext, PDO::PARAM_STR, strlen($bodytext));
    $sth->execute();
} elseif ($module_name == 'about') {
    $sth = $db->prepare("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (id, title, alias, image, imagealt, description, bodytext, keywords, socialbutton, activecomm, layout_func, weight, admin_id, add_time, edit_time, status) VALUES (1, 'Welcome to NukeViet 3.0', 'Welcome-to-NukeViet-3-0', '', '', '', :bodytext, '', 0, 4, '', 1, 1, 1277266815, 1277266815, 1) ");
    $bodytext = "<p> NukeViet developed by Vietnamese and for Vietnamese. It&#039;s the 1st opensource CMS in Vietnam. Next generation of NukeViet, version 3.0 coding ground up. Support newest web technology, include xHTML, CSS 3, XTemplate, jQuery, AJAX...<br /> <br /> NukeViet&#039;s has it own core libraries build in. So, it&#039;s doesn&#039;t depend on other exists frameworks. With basic knowledge of PHP and MySQL, you can easily using NukeViet for your purposes.<br /> <br /> NukeViet 3 core is simply but powerful. It support modules can be multiply. We called it abstract modules. It help users automatic crea-te many modules without any line of code from any exists module which support crea-te abstract modules.<br /> <br /> NukeViet 3 support automatic setup modules, blocks, themes at Admin Control Panel. It&#039;s also allow you to share your modules by packed it into packets.<br /> <br /> NukeViet 3 support multi languages in 2 types. Multi interface languages and multi database langguages. Had features support web master to build new languages. Many advance features still developing. Let use it, distribute it and feel about opensource.<br /> <br /> At last, NukeViet 3 is a thanksgiving gift from VINADES.,JSC to community for all of your supports. And we hoping we going to be a biggest opensource CMS not only in VietNam, but also in the world. :).<br /> <br /> If you had any feedbacks and ideas for NukeViet 3 close beta. Feel free to send email to admin@nukeviet.vn. All are welcome<br /> <br /> Best regard.</p>";
    $sth->bindParam(':bodytext', $bodytext, PDO::PARAM_STR, strlen($bodytext));
    $sth->execute();

    $sth = $db->prepare("INSERT INTO " . $db_config['prefix'] . "_" . $lang . "_" . $module_data . " (id, title, alias, image, imagealt, description, bodytext, keywords, socialbutton, activecomm, layout_func, weight, admin_id, add_time, edit_time, status) VALUES (2, 'NukeViet&#039;s versioning schemes', 'NukeViet-s-versioning-schemes', '', '', '', :bodytext, '', 0, 4, '', 2, 1, 1277267054, 1277693688, 1)");
    $bodytext = "<p> NukeViet using 2 versioning schemes:<br /> <br /> I. By numbers (technical purposes):<br /> Structure for numbers is:<br /> major.minor.revision<br /> <br /> 1.Major: Major up-date. Probably not backwards compatible with older version.<br /> 2.Minor: Minor change, may introduce new features, but backwards compatibility is mostly retained.<br /> 3.Revision: Minor bug fixes. Packed for testing or pre-release purposes... Closed beta, open beta, RC, Official release.<br /> <br /> II: By names (new version release management)<br /> Main milestones: Closed beta, Open beta, Release candidate, Official.<br /> 1. Closed beta: Limited testing.<br /> characteristics: New features testing. It may not include in official version if doesn&#039;t accord with community. Closed beta&#039;s name can contain unique numbers. Ex: Closed beta 1, closed beta 2,... Features of previous release may not include in it&#039;s next release. Time release is announced by development team. This milestone stop when system haven&#039;t any major changes.<br /> Purposes: Pre-release version to receive feedbacks and ideas from community. Bug fixes for release version.<br /> Release to: Programmers, expert users.<br /> Supports:<br /> &nbsp;&nbsp;&nbsp; Using: None.<br /> &nbsp;&nbsp;&nbsp; Testing: Documents, not include manual.<br /> Upgrade: None.<br /> <br /> 2. Open beta: Public testing.<br /> characteristics: Features testing, contain full features of official version. It&#039;s almost include in official version even if it doesn&#039;t accord with community. This milestone start after closed beta milestone closed and release weekly to fix bugs. Open beta&#039;s name can contain unique numbers. Ex: Open beta 1, open beta 2,... Next release include all features of it&#039;s previous release. Open beta milestone stop when system haven&#039;t any critical issue.<br /> Purposes: Bug fixed which not detect in closed beta.<br /> Release to: All users of nukeviet.vn forum.<br /> Supports:<br /> &nbsp;&nbsp;&nbsp; Using: Limited. Manual and forum supports.<br /> &nbsp;&nbsp;&nbsp; Testing: Full.<br /> Upgrade: None.<br /> <br /> 3. Release Candidate:<br /> characteristics: Most stable version and prepare for official release. Release candidate&#039;s name can contain unique numbers.<br /> Ex: RC 1, RC 2,... by released number.<br /> If detect cretical issue in this milestone. Another Release Candidate version can be release sooner than release time announced by development team.<br /> Purposes: Reduce bugs of using official version.<br /> Release to: All people.<br /> Supports: Full.<br /> Upgrade: Yes.<br /> <br /> 4. Official:<br /> characteristics: 1st stable release of new version. It only using 1 time. Next release using numbers. Release about 2 weeks after Release Candidate milestone stoped.<br /> Purposes: Stop testing and recommend users using new version.</p>";
    $sth->bindParam(':bodytext', $bodytext, PDO::PARAM_STR, strlen($bodytext));
    $sth->execute();
}

$db->query("UPDATE " . $db_config['prefix'] . "_config SET config_value = '0' WHERE module = '" . $module_name . "' AND config_name = 'activecomm' AND lang='" . $lang . "'");
