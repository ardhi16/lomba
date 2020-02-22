<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_users extends CI_Migration {

        public function up()
        {
                $this->dbforge->add_field(
                        [
                        'id_user' => [
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ],
                        'username' => [
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ],
                        'password' => [
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ],
                        'display' => [
                                'type' => 'VARCHAR',
                                'constraint' => 255,
                        ],
                        'wallet' => [
                                'type' => 'int',
                                'null' => TRUE,
                        ]
                ]
        );
          
                $this->dbforge->add_key('id_user', TRUE);
                $this->dbforge->create_table('blog');
                // $this->dbforge->create_database('mydb');
        }
}