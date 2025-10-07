<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Migration_Create_mahasiswa extends CI_Migration {

    public function up()
    {
        $this->dbforge->add_field([
            'id_mahasiswa' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],
            'nim' => [
                'type' => 'VARCHAR',
                'constraint' => '20'
            ],
            'nama' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ],
            'jurusan' => [
                'type' => 'VARCHAR',
                'constraint' => '100'
            ]
        ]);
        $this->dbforge->add_key('id_mahasiswa', TRUE);
        $this->dbforge->create_table('mahasiswa');
    }

    public function down()
    {
        $this->dbforge->drop_table('mahasiswa');
    }
}
