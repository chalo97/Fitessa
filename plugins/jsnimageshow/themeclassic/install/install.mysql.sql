CREATE TABLE IF NOT EXISTS `#__imageshow_theme_classic` (
  `theme_id` int(11) unsigned NOT NULL auto_increment,
  `imgpanel_presentation_mode` char(30) default '0',
  `imgpanel_img_transition_type_fit` char(30) default '',
  `imgpanel_img_transition_timing_fit` char(50) default NULL,
  `imgpanel_img_click_action_fit` char(30) default '',
  `imgpanel_img_transition_type_expand` char(30) default '',
  `imgpanel_img_transition_timing_expand` char(255) default '50',
  `imgpanel_img_motion_type_expand` char(30) default '',
  `imgpanel_img_motion_timing_expand` char(50) default NULL,
  `imgpanel_img_click_action_expand` char(30) default '',
  `imgpanel_bg_type` char(30) default '',
  `imgpanel_bg_value` char(255) default NULL,
  `imgpanel_show_watermark` tinyint(1) default '0',
  `imgpanel_watermark_path` char(255) default NULL,
  `imgpanel_watermark_position` char(30) default '',
  `imgpanel_watermark_offset` char(30) default NULL,
  `imgpanel_watermark_opacity` char(30) default NULL,
  `imgpanel_show_overlay_effect` tinyint(1) default '1',
  `imgpanel_overlay_effect_type` char(30) default NULL,
  `imgpanel_show_inner_shawdow` tinyint(1) default '0',
  `imgpanel_inner_shawdow_color` char(30) default NULL,
  `thumbpanel_show_panel` char(30) default NULL,
  `thumbpanel_panel_position` char(30) default '',
  `thumbpanel_collapsible_position` tinyint(1) default '0',
  `thumbpanel_thumb_browsing_mode` char(30) default '',
  `thumbpanel_show_thumb_status` tinyint(1) default '0',
  `thumbpanel_active_state_color` char(30) default NULL,
  `thumbpanel_presentation_mode` char(30) default '',
  `thumbpanel_border` char(30) default NULL,
  `thumbpanel_enable_big_thumb` tinyint(1) default '0',
  `thumbpanel_big_thumb_size` char(30) default NULL,
  `thumbpanel_thumb_row` char(30) default NULL,
  `thumbpanel_thumb_width` char(30) default NULL,
  `thumbpanel_thumb_height` char(30) default NULL,
  `thumbpanel_big_thumb_color` char(30) default NULL,
  `thumbpanel_thumb_border` char(30) default NULL,
  `thumbpanel_thumnail_panel_color` char(30) default NULL,
  `thumbpanel_thumnail_normal_state` char(30) default NULL,
  `infopanel_panel_position` char(30) default '',
  `infopanel_presentation` char(30) default NULL,
  `infopanel_bg_color_fill` char(30) default NULL,
  `infopanel_panel_click_action` char(30) default NULL,
  `infopanel_show_title` tinyint(1) default '0',
  `infopanel_title_css` char(250) default NULL,
  `infopanel_show_des` tinyint(1) default '0',
  `infopanel_des_lenght_limitation` char(30) default '',
  `infopanel_des_css` char(250) default NULL,
  `infopanel_show_link` tinyint(1) default '0',
  `infopanel_link_css` char(250) default NULL,
  `toolbarpanel_panel_position` char(30) default '',
  `toolbarpanel_presentation` char(30) default '0',
  `toolbarpanel_show_image_navigation` tinyint(1) default '0',
  `toolbarpanel_slideshow_player` tinyint(1) default '0',
  `toolbarpanel_show_fullscreen_switcher` tinyint(1) default '0',
  `toolbarpanel_show_tooltip` tinyint(1) default '0',
  `slideshow_show_thumb_panel` char(30) default NULL,
  `slideshow_show_overlay_effect` tinyint(1) default '0',
  `slideshow_slide_timing` char(50) default NULL,
  `slideshow_show_image_navigation` tinyint(1) default '0',
  `slideshow_process` tinyint(1) default '0',
  `slideshow_show_watermark` tinyint(1) default '0',
  `slideshow_show_status` tinyint(1) default '1',
  `slideshow_enable_ken_burn_effect` tinyint(1) default '1',
  `slideshow_presentation_mode` char(30) default NULL,
  `slideshow_looping` tinyint(1) default '1',
  PRIMARY KEY  (`theme_id`)
) TYPE=MyISAM CHARACTER SET `utf8`;
