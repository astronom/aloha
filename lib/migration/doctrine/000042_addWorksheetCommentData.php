<?php
/**
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class addWorksheetCommentData extends Doctrine_Migration_Base
{
    public function up()
    {
	    $this->addColumn('worksheet', 'comment_data', 'text', '1024', array(
          ));
    }

    public function down()
    {
	    $this->removeColumn('worksheet', 'comment_data');
    }
}