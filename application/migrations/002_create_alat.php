<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_alat extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field([
            'id_alat' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nama_alat' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'stok' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ]
        ]);
        $this->dbforge->add_key('id_alat', TRUE);
        $this->dbforge->create_table('alat');
    }

    public function down()
    {
        $this->dbforge->drop_table('alat');
    }
}
