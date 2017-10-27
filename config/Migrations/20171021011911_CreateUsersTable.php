<?php
use Migrations\AbstractMigration;

class CreateUsersTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * More information on this method is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-change-method
     * @return void
     */
    public function change()
    {
        $table = $this->table("users");
        $table->addColumn("nombre", "string", array("limit" => 100))
              ->addColumn("apellido", "string", array("limit" => 100))
              ->addColumn("email", "string", array("limit" => 100))
              ->addColumn("clave", "string")
              ->addColumn("role", "enum", array("values" => "admin, user"))
              ->addColumn("active", "boolean")
              ->addColumn("created", "datetime")
              ->addColumn("modified", "datetime")
              ->create();
    }
}
