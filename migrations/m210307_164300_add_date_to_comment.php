<?php

use yii\db\Migration;

/**
 * Class m210307_164300_add_date_to_comment
 */
class m210307_164300_add_date_to_comment extends Migration
{

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->addColumn('comment','date', $this->date());

    }

    public function down()
    {
        $this->dropColumn('comment','date');

    }

}
