<?php
/**
 *
 * @author isdarka
 * @created Nov 25, 2013 4:12:27 PM
 */

return array(
		'mail' => array(
				'transport' => array(
						'options' => array(
								'host'              => 'pcsmexico.com',
								'connection_class'  => 'login',//plain, login
								'port' => 465,
								'connection_config' => array(
										'username' => 'irvelasco@pcsmexico.com',
										'password' => 'v3l4sc012',
										'ssl' => 'ssl' //tls, ssl
								),
						),
				),
		),
);