<?php
/*
 * Netlabs Admin Framework
 */
 
 
function lets_define_admin_layouts() {
	$ntl_layouts = array(
		array(
			'dash' 				=> '0',
			'tab' 				=> '0',
			'action' 			=> '0',
			'dashname' 			=> __('General', 'localize'),
			'tabname' 			=> __('General', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> __('General options updated', 'localize'),
			'posttype' 			=> '',
			'values' 			=> array(								
				
				array(
					'type' 		=> 'fontlist',
					'name' 		=> __('Font', 'localize'),
					'desc' 		=> __('Select the additional font to use with the theme', 'localize'),
					'fn' 		=> 'cro_font',
					'def' 		=> 'Open Sans',
					'options' 	=> '',
					'before' 	=> 'startone',
					'after' 	=> ''
				),
				array(
					'type' 		=> 'linkto',
					'name' 		=> __('Welcome Message', 'localize'),
					'desc' 		=> __('Select your welcome message page.', 'localize'),
					'fn' 		=> 'cro_welcomepage',
					'def' 		=> '',
					'options' 	=> array('page'),
					'after' 	=> 'endone'
				),
				array(
					'type' 		=> 'selectcolor',
					'name' 		=> __('Theme color', 'localize'),
					'desc' 		=> __('Color for the menu.', 'localize'),
					'fn' 		=> 'cro_themecolor',
					'def'		=> '#24AFD0',
					'options' 	=> array(),
					'before' 	=> 'startone',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Menu Label', 'localize'),
					'fn' 		=> 'menulabel',
					'def'		=> '-Navigation Menu -',
					'desc' 		=> __('Menu label for mobile devices.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type' 		=> 'selectone',
					'name' 		=> __('Show timetable banner', 'localize'),
					'desc' 		=> __('Show the timetablebanner', 'localize'),
					'fn' 		=> 'cro_ttablebanner',
					'def'		=> 1,
					'options' 	=> array(__('Do not show.', 'localize'),__('Front Page only', 'localize'), __('All pages', 'localize')),
					'before' 	=> '',
					'after' 	=> ''
				),	
				array(
					'type' 		=> 'selectone',
					'name' 		=> __('Show feedback banner', 'localize'),
					'desc' 		=> __('Show the feedback banner', 'localize'),
					'fn' 		=> 'cro_feedbackbanner',
					'def'		=> 1,
					'options' 	=> array(__('Do not show.', 'localize'),__('Front Page only', 'localize'), __('All pages', 'localize')),
					'before' 	=> '',
					'after' 	=> 'endone'
				),				
			)				
		),
		array(
			'dash' 				=> '0',
			'tab' 				=> '1',
			'action' 			=> '0',
			'dashname' 			=> __('General', 'localize'),
			'tabname' 			=> __('Logo', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> __('Logo options updated', 'localize'),
			'posttype' 			=> '',
			'values' 			=> array(
				array(
					'type' 		=> 'getlogo',
					'name' 		=> __('Theme Logo', 'localize'),
					'fn' 		=> 'logo',
					'def'		=> '',
					'desc' 		=> __('Upload your theme logo.<br/><br/> Click <span>insert into post</span> when you are done uploading to insert logo', 'localize'),
					'before' 	=> 'startone',
					'after' 	=> ''
				),
				array(
					'type' 		=> 'selectone',
					'name' 		=> __('Logo Background', 'localize'),
					'desc' 		=> __('Show the logo background?', 'localize'),
					'fn' 		=> 'cro_logobg',
					'def'		=> 2,
					'options' 	=> array(__('Yes', 'localize'),__('No', 'localize')),
					'before' 	=> '',
					'after' 	=> 'endone'
				),
				array(
					'type' 		=> 'selectlist',
					'name' 		=> __('Padding left', 'localize'),
					'desc' 		=> __('Add padding left with the background', 'localize'),
					'fn' 		=> 'cro_paddingleft',
					'def'		=> 0,
					'options' 	=> array(0, 5,10,15,20,25,30,35,40,45,50,55,60),
					'before' 	=> 'startone',
					'after' 	=> ''
				),	
				array(
					'type' 		=> 'selectlist',
					'name' 		=> __('Padding right', 'localize'),
					'desc' 		=> __('Add padding right with the background', 'localize'),
					'fn' 		=> 'cro_paddingright',
					'def'		=> 0,
					'options' 	=> array(0,5,10,15,20,25,30,35,40,45,50,55,60),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type' 		=> 'selectlist',
					'name' 		=> __('Padding top', 'localize'),
					'desc' 		=> __('Add padding top with the background', 'localize'),
					'fn' 		=> 'cro_paddingtop',
					'def'		=> 0,
					'options' 	=> array(0,5,10,15,20,25,30,35,40,45,50,55,60),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type' 		=> 'selectlist',
					'name' 		=> __('Padding bottom', 'localize'),
					'desc' 		=> __('Add padding bottom with the background', 'localize'),
					'fn' 		=> 'cro_paddingbottom',
					'def'		=> 0,
					'options' 	=> array(0,5,10,15,20,25,30,35,40,45,50,55,60),
					'before' 	=> '',
					'after' 	=> 'endone'
				),									
			)				
		),
		array(
			'dash' 				=> '0',
			'tab' 				=> '2',
			'action' 			=> '0',
			'dashname' 			=> __('General', 'localize'),
			'tabname' 			=> __('Social', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> __('Social options updated', 'localize'),
			'posttype' 			=> '',
			'values' 			=> array(
				array(
					'type'		=> 'input',
					'name' 		=> __('Facebook link', 'localize'),
					'fn' 		=> 'facebook',
					'def'		=> '',
					'desc' 		=> __('Link to your Facebook profile.', 'localize'),
					'before' 	=> 'startone',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Twitter link', 'localize'),
					'fn' 		=> 'twitter',
					'def'		=> '',
					'desc' 		=> __('Link to your Twitter profile.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('RSS link', 'localize'),
					'fn' 		=> 'rss',
					'def'		=> '',
					'desc' 		=> __('Link to your RSS profile.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Mail link', 'localize'),
					'fn' 		=> 'mail',
					'def'		=> '',
					'desc' 		=> __('Link to your e-Mail.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Google plus link', 'localize'),
					'fn' 		=> 'googleplus',
					'def'		=> '',
					'desc' 		=> __('Link to your Google plus profile.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Instagram link', 'localize'),
					'fn' 		=> 'instagram',
					'def'		=> '',
					'desc' 		=> __('Link to your Instagram profile.', 'localize'),
					'before' 	=> '',
					'after' 	=> 'endone'
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Pinterest link', 'localize'),
					'fn' 		=> 'pinterest',
					'def'		=> '',
					'desc' 		=> __('Link to your Pinterest profile.', 'localize'),
					'before' 	=> 'startone',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Vimeo Link', 'localize'),
					'fn' 		=> 'vimeo',
					'def'		=> '',
					'desc' 		=> __('Link to your Vimeo profile.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Youtube link', 'localize'),
					'fn' 		=> 'youtube',
					'def'		=> '',
					'desc' 		=> __('Link to your Youtube profile.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Linkedin Label', 'localize'),
					'fn' 		=> 'linkedin',
					'def'		=> '',
					'desc' 		=> __('Link to your Linkedin profile.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Flickr link', 'localize'),
					'fn' 		=> 'flickr',
					'def'		=> '',
					'desc' 		=> __('Link to your Flickr profile.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Foursquare link', 'localize'),
					'fn' 		=> 'foursquare',
					'def'		=> '',
					'desc' 		=> __('Link to your Foursquare profile.', 'localize'),
					'before' 	=> '',
					'after' 	=> 'endone'
				)										
			)				
		),
		array(
			'dash' 				=> '0',
			'tab' 				=> '3',
			'action' 			=> '0',
			'dashname' 			=> __('General', 'localize'),
			'tabname' 			=> __('Contacts', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> __('Contact options updated', 'localize'),
			'posttype' 			=> '',
			'values' 			=> array(
				array(
					'type'		=> 'textarea',
					'name' 		=> __('Contact form header', 'localize'),
					'fn' 		=> 'cro_ctchead',
					'def'		=> 'Get in Contact',
					'desc' 		=> __('Header message for the contact form', 'localize'),
					'before' 	=> 'startone',
					'after' 	=> ''
				),
				array(
					'type'		=> 'textarea',
					'name' 		=> __('Contact Details Header', 'localize'),
					'fn' 		=> 'cro_ctcdethead',
					'def'		=> 'Contact Details',
					'desc' 		=> __('Contact Details header', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Driving directions label', 'localize'),
					'fn' 		=> 'cro_drivdirlabel',
					'def'		=> 'Need Driving Directions?',
					'desc' 		=> __('Label for the driving directions button.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'textarea',
					'name' 		=> __('Message to admin(subject)', 'localize'),
					'fn' 		=> 'cro_ctcadmin_s',
					'def'		=> 'Form submitted',
					'desc' 		=> __('Subject line of the message sent to admin if a contact form is submitted.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'textarea',
					'name' 		=> __('Message to customer(subject)', 'localize'),
					'fn' 		=> 'cro_ctccust_s',
					'def'		=> 'Your query on our website.',
					'desc' 		=> __('Subject line of the message sent to the customer if a contact form is submitted.', 'localize'),
					'before' 	=> '',
					'after' 	=> 'endone'
				),
				array(
					'type'		=> 'textarea',
					'name' 		=> __('Success message', 'localize'),
					'fn' 		=> 'cro_ctcsuc',
					'def'		=> 'Thanks for your message. We will be in contact shortly',
					'desc' 		=> __('Success message for the contact form', 'localize'),
					'before' 	=> 'startone',
					'after' 	=> ''
				),
				array(
					'type'		=> 'textarea',
					'name' 		=> __('Error message', 'localize'),
					'fn' 		=> 'cro_ctcerr',
					'def'		=> 'Your form cannot be processed. Please review the content and submit again.',
					'desc' 		=> __('Error message for the contact form', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type' 		=> 'selectone',
					'name' 		=> __('Email multiple Locations', 'localize'),
					'desc' 		=> __('Multiple locations with seperate emails.<br/> If you activate this value, you need to have more than one location.<br/> The email addresses specified in the location post will be used as admin email', 'localize'),
					'fn' 		=> 'cro_multiplerecipient',
					'def'		=> 1,
					'options' 	=> array(__('No', 'localize'),__('Yes', 'localize')),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Email address', 'localize'),
					'fn' 		=> 'cro_ctcemail',
					'def'		=> '',
					'desc' 		=> __('Email address that should receive contact form info.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'textarea',
					'name' 		=> __('Message to admin(body)', 'localize'),
					'fn' 		=> 'cro_ctcadmin',
					'def'		=> 'Hi admin. You had a query on your website. Details below.',
					'desc' 		=> __('Body of the message sent to admin if a contact form is submitted.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'textarea',
					'name' 		=> __('Message to customer(body)', 'localize'),
					'fn' 		=> 'cro_ctccust',
					'def'		=> 'Thanks you for making contact. We will be in touch shortly. Details of your query below.',
					'desc' 		=> __('Body of the message sent to the customer if a contact form is submitted.', 'localize'),
					'before' 	=> '',
					'after' 	=> 'endone'
				)
									
			)				
		),
		array(
			'dash' 				=> '1',
			'tab' 				=> '0',
			'action' 			=> '0',
			'dashname' 			=> __('Front Page', 'localize'),
			'tabname' 			=> __('Front content', 'localize'),
			'savetype' 			=> 'postsave',
			'updatemess' 		=> __('Front content updated', 'localize'),
			'posttype' 			=> 'frontcontents',
			'values' 			=> array(
								
				array(
					'type' 		=> 'getlogo',
					'name' 		=> __('Content Image', 'localize'),
					'fn' 		=> 'themeslide',
					'desc' 		=> __('Upload your image image.', 'localize'),
					'before' 	=> 'startpost',
					'after' 	=> '',
					'default' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Title', 'localize'),
					'fn' 		=> 'cro_imgtitle',
					'def'		=> '',
					'desc' 		=> __('Title of the content. Will not work for video', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type' 		=> 'linkto',
					'name' 		=> __('Link to', 'localize'),
					'desc' 		=> __('Select a page to link to.', 'localize'),
					'fn' 		=> 'ss-pagelink',
					'def' 		=> '',
					'options' 	=> array('page'),
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Alternate link', 'localize'),
					'fn' 		=> 'cro_altlink',
					'def'		=> '',
					'desc' 		=> __('Specify a custom link to link to', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				)		
			)				
		),
		array(
			'dash' 				=> '1',
			'tab' 				=> '1',
			'action' 			=> '0',
			'dashname' 			=> __('Front Page', 'localize'),
			'tabname' 			=> __('Slideshow', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> __('Slideshow updated', 'localize'),
			'posttype' 			=> '',
			'values' 			=> array(
								
				
				array(
					'type'		=> 'getslider',
					'name' 		=> __('Slider to show', 'localize'),
					'fn' 		=> 'cro_slidelink',
					'def'		=> '',
					'desc' 		=> __('Specify a slideshow to show', 'localize'),
					'before' 	=> 'startone',
					'after' 	=> 'endone'
				)		
			)				
		),
		array(
			'dash' 				=> '2',
			'tab' 				=> '0',
			'action' 			=> '0',
			'dashname' 			=> __('Utilities', 'localize'),
			'tabname' 			=> __('Sidebars', 'localize'),
			'savetype' 			=> 'keyvalsave',
			'updatemess' 		=> __('Sidebar Settings updated', 'localize'),
			'posttype' 			=> '',
			'values' 			=> array(
					
				array(
					'type' 		=> 'itemlist',
					'name' 		=> __('Custom Sidebar Manager', 'localize'),
					'fn' 		=> 'cro_sidebars',
					'desc' 		=> __('Name your custom sidebars.', 'localize'),
					'before' 	=> 'startbroad',
					'after' 	=> 'endone',
					'default' 	=> ''
				)								
			)				
		),
		array(
			'dash' 				=> '2',
			'tab' 				=> '1',
			'action' 			=> '0',
			'dashname' 			=> __('General', 'localize'),
			'tabname' 			=> __('Newsletter', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> __('Newsletter options updated', 'localize'),
			'posttype' 			=> '',
			'values' 			=> array(
				array(
					'type'		=> 'input',
					'name' 		=> __('Admin subjectline', 'localize'),
					'fn' 		=> 'cro_adminsubjectline',
					'def'		=> 'New Newsletter subscription from your website',
					'desc' 		=> __('Subjectline of the email to admin with new subscriber details.', 'localize'),
					'before' 	=> 'startone',
					'after' 	=> ''
				),
				array(
					'type'		=> 'textarea',
					'name' 		=> __('Admin message', 'localize'),
					'fn' 		=> 'cro_adminmessage',
					'def'		=> 'Hi Admin you hade a new newsletter subscription. Details below:',
					'desc' 		=> __('Message of the email to admin with new subscriber details.', 'localize'),
					'before' 	=> '',
					'after' 	=> 'endone'
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Subscriber subjectline', 'localize'),
					'fn' 		=> 'cro_subscribersubjectline',
					'def'		=> 'Thank you for subscribing to our newsletter',
					'desc' 		=> __('Subjectline of the thank you email to subscriber.', 'localize'),
					'before' 	=> 'startone',
					'after' 	=> ''
				),
				array(
					'type'		=> 'textarea',
					'name' 		=> __('Subscriber message', 'localize'),
					'fn' 		=> 'cro_subscribermessage',
					'def'		=> 'Thank you for subscribing to our newsletter. Your first issue will follow shortly.',
					'desc' 		=> __('Message of the email to subscriber.', 'localize'),
					'before' 	=> '',
					'after' 	=> ''
				),
				array(
					'type'		=> 'input',
					'name' 		=> __('Email address', 'localize'),
					'fn' 		=> 'cro_newsletteremail',
					'def'		=> '',
					'desc' 		=> __('Email address that should receive notification.', 'localize'),
					'before' 	=> '',
					'after' 	=> 'endone'
				)
									
			)				
		),
		array(
			'dash' 				=> '3',
			'tab' 				=> '0',
			'action' 			=> '0',
			'dashname' 			=> __('Help', 'localize'),
			'tabname' 			=> __('Help', 'localize'),
			'savetype' 			=> 'optionsave',
			'updatemess' 		=> '',
			'posttype' 			=> '',
			'values' 			=> array(
					
				array(
					'type' 		=> 'helplist',
					'name' 		=> __('Theme Help', 'localize'),
					'fn' 		=> 'cro_themehelp',
					'desc' 		=> __('Theme Help.', 'localize'),
					'before' 	=> 'startbroad',
					'after' 	=> 'endone',
					'default' 	=> ''
				)								
			)				
		)		
	);

	return apply_filters( 'lets_define_admin_layouts', $ntl_layouts );
}



?>