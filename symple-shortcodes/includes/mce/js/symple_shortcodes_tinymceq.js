(function() {
    tinymce.PluginManager.add('my_mce_button', function( editor, url ) {
        editor.addButton( 'my_mce_button', {
            text: 'Shortcode',
            icon: false,
            type: 'menubutton',
            menu: [
                {
                    text: 'Profile',
                    menu: [
                       {
                            text: 'Profile',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Profile',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_profile_page_title',
                                            label: 'Page Title',
                                            value: 'Profile',
                                        }
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_page_title]'+ e.data.vt_profile_page_title + '[/vt_page_title]');
									}
                                });
                            }
                        }, 
                       {
                            text: 'Profile Field',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Profile Field',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_profile_title',
                                            label: 'Field Title',
                                            value: 'Full name',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_profile_title_value',
                                            label: 'Field Value',
                                            value: 'john@dotrex.co',
                                        }
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_profile_field title="' + e.data.vt_profile_title + '"] ' + e.data.vt_profile_title_value + ' [/vt_profile_field]');
									}
                                });
                            }
                        }, 
                    ]
                },
                {
                    text: 'Education',
                    menu: [
                       {
                            text: 'Education',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Education',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_education_page_title',
                                            label: 'Page Title',
                                            value: 'Education',
                                        }
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_page_title]'+ e.data.vt_education_page_title + '[/vt_page_title]');
									}
                                });
                            }
                        }, 
                       {
                            text: 'Education Field',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Education Field',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_education_title',
                                            label: 'Title',
                                            value: 'GRAPHIC DESIGN',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_education_cource_title',
                                            label: 'Cource title',
                                            value: 'St. Patrick University (2 Years Course)',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_education_cource_time',
                                            label: 'Passing time',
                                            value: 'Graduation May 2013',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_education_cource_description',
                                            label: 'Description',
                                            value: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',											
                                            multiline: true,
                                            minWidth: 450,
                                            minHeight: 45
                                        }
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_education_field title="' + e.data.vt_education_title + '" cource_title="' + e.data.vt_education_cource_title + '" cource_time="' + e.data.vt_education_cource_time + '"]' + e.data.vt_education_cource_description + ' [/vt_education_field]');
									}
                                });
                            }
                        }, 
                    ]
                },
                {
                    text: 'Experience',
                    menu: [
                       {
                            text: 'Experience',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Work Experience',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_experience_page_title',
                                            label: 'Page Title',
                                            value: 'WORK EXPERIENCE',
                                        }
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_page_title]'+ e.data.vt_experience_page_title + '[/vt_page_title]');
									}
                                });
                            }
                        }, 
                       {
                            text: 'Experience Field',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Experience Field',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_experience_title',
                                            label: 'Title',
                                            value: 'Black Tie Corp',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_experience_designation',
                                            label: 'Designation',
                                            value: 'Web Designer',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_experience_duration',
                                            label: 'Working Time',
                                            value: 'June 2012 - Current',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_experience_description',
                                            label: 'Description',
                                            value: 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.',											
                                            multiline: true,
                                            minWidth: 450,
                                            minHeight: 45
                                        }
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_experience_field title="' + e.data.vt_experience_title + '" designation="' + e.data.vt_experience_designation + '" duration="' + e.data.vt_experience_duration + '"]' + e.data.vt_experience_description + ' [/vt_experience_field]');
									}
                                });
                            }
                        }, 
                    ]
                },
                {
                    text: 'Skills',
                    menu: [
                       {
                            text: 'Skills',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Skills',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_skills_page_title',
                                            label: 'Page Title',
                                            value: 'SKILLS',
                                        }
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_page_title]'+ e.data.vt_skills_page_title + '[/vt_page_title]');
									}
                                });
                            }
                        }, 
                       {
                            text: 'Skills set',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Skills Field',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_skill_set_title',
                                            label: 'Skill set title',
                                            value: 'Professional Skills',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_skill_title_1',
                                            label: 'Skill Title - 1',
                                            value: 'Comunication',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_skill_percentage_1',
                                            label: 'Percentage',
                                            value: '70%',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_skill_title_2',
                                            label: 'Skill Title - 2',
                                            value: 'Leadership',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_skill_percentage_2',
                                            label: 'Percentage',
                                            value: '90%',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_skill_title_3',
                                            label: 'Skill Title - 3',
                                            value: 'Confidence',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_skill_percentage_3',
                                            label: 'Percentage',
                                            value: '85%',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_skill_title_4',
                                            label: 'Skill Title - 4',
                                            value: '',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_skill_percentage_4',
                                            label: 'Percentage',
                                            value: '',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_skill_title_5',
                                            label: 'Skill Title - 5',
                                            value: '',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_skill_percentage_5',
                                            label: 'Percentage',
                                            value: '',
                                        },
                                    ],

                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_skill_field title="' + e.data.vt_skill_set_title + '" skill_title_1="' + e.data.vt_skill_title_1 + '" percentage_1="' + e.data.vt_skill_percentage_1 + '" skill_title_2="' + e.data.vt_skill_title_2 + '" percentage_2="' + e.data.vt_skill_percentage_2 + '"  skill_title_3="' + e.data.vt_skill_title_3 + '" percentage_3="' + e.data.vt_skill_percentage_3 + '"  skill_title_4="' + e.data.vt_skill_title_4 + '" percentage_4="' + e.data.vt_skill_percentage_4 + '" skill_title_5="' + e.data.vt_skill_title_5 + '" percentage_5="' + e.data.vt_skill_percentage_5 + '" ][/vt_skill_field]');
									}
                                });
                            }
                        }, 
                    ]
                },
                {
                    text: 'Interests',
                    menu: [
                       {
                            text: 'Interests',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Interests',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_interests_page_title',
                                            label: 'Page Title',
                                            value: 'Interests',
                                        }
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_page_title]'+ e.data.vt_interests_page_title + '[/vt_page_title]');
									}
                                });
                            }
                        }, 
                       {
                            text: 'Interest Field',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Interests Field',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_interests_title',
                                            label: 'Title',
                                            value: 'Art',
                                        },
                                        {
                                            type: 'textbox',
                                            name: 'vt_interestes_description',
                                            label: 'Description',
                                            value: 'Praesent tellus ligula, tincidunt et fringilla vel, tincidunt ut dui. Nulla feugiat, lacus ac malesuada lobortis, elit nunc congue nunc, vel imperdiet lorem leo a lectus.',
                                            multiline: true,
                                            minWidth: 450,
                                            minHeight: 45
                                        }
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_interestes_field title="' + e.data.vt_interests_title + '"]' + e.data.vt_interestes_description + ' [/vt_interestes_field]');
									}
                                });
                            }
                        }, 
                    ]
                },
                {
                    text: 'Portfolio',
                    menu: [
                       {
                            text: 'Portfolio',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Portfolio',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_portfolio_page_title',
                                            label: 'Page Title',
                                            value: 'Portfolio',
                                        }
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_page_title]'+ e.data.vt_portfolio_page_title + '[/vt_page_title]');
									}
                                });
                            }
                        },
					   {
                            text: 'Portfolio post',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Portfolio post comes from backend option Portfolio.',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_portfolio_title',
                                            label: 'Title',
                                            value: 'Some Works',
                                        }                                      
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_portfolio title="' + e.data.vt_portfolio_title + '"][/vt_portfolio]');
									}
                                });
                            }
                        },						
                    ]
                },
                {
                    text: 'Contact',
                    menu: [
                       {
                            text: 'Contact',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Contact',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_conatct_page_title',
                                            label: 'Page Title',
                                            value: 'Contact',
                                        }
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_page_title]'+ e.data.vt_conatct_page_title + '[/vt_page_title]');
									}
                                });
                            }
                        },
					   {
                            text: 'Contact post',
                            onclick: function() {
                                editor.windowManager.open( {
                                    title: 'Please install the contact form 7 plugin and add your contact form shortcode.',
                                    body: [
                                        {
                                            type: 'textbox',
                                            name: 'vt_contact_title',
                                            label: 'Title',
                                            value: 'SEND ME A MESSAGE',
                                        },
										{
                                            type: 'textbox',
                                            name: 'vt_contact_cf7',
                                            label: 'Contact form shortcode',
                                            value: '',
                                        }                                      
                                    ],
                                    onsubmit: function( e ) {
									editor.insertContent( '[vt_contact title="' + e.data.vt_contact_title + '" address="ADDRESS" phone="PHONE" mail="MAIL"]' + e.data.vt_contact_cf7 + '[/vt_contact]');
									}
                                });
                            }
                        },						
                    ]
                }						
            ]

        });

    });

})();
