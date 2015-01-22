    <?php

/**
 * This is the model class for table "tbl_interests".
 *
 * The followings are the available columns in table 'tbl_interests':
 * @property string $Description
 * @property string $Likes
 * @property string $Hobbies
 * @property string $Work
 * @property string $title
 * @property string $image
 */
class Interests extends CActiveRecord
{
    /**
     * @return string the associated database table name
     */
    
    
    public function tableName()
    {
        return 'tbl_interests';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules()
    {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('description, likes, hobbies, work', 'length', 'max'=>500),
           
            // The following rule is used by search().
            // @todo Please remove those attributes that should not be searched.
            array('description, likes, hobbies, work', 'safe', 'on'=>'search'),
             array('image','file','types'=>'jpg,gif,png', 'allowEmpty'=>true,'on'=>'update'),
             array('title, image','length', 'max'=>255, 'on'=>'insert,update'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations()
    {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels()
    {
        return array(
            'id' => 'Id',
            'username' => 'Username',
            'description' => 'Description',
            'likes' => 'Likes',
            'hobbies' => 'Hobbies',
            'work' => 'Work',
        );
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     *
     * Typical usecase:
     * - Initialize the model fields with values from filter form.
     * - Execute this method to get CActiveDataProvider instance which will filter
     * models according to data in model fields.
     * - Pass data provider to CGridView, CListView or any similar widget.
     *
     * @return CActiveDataProvider the data provider that can return the models
     * based on the search/filter conditions.
     */
    public function search()
    {
        // @todo Please modify the following code to remove attributes that should not be searched.

        $criteria=new CDbCriteria;

        $criteria->compare('description',$this->description,true);
        $criteria->compare('likes',$this->likes,true);
        $criteria->compare('hobbies',$this->hobbies,true);
        $criteria->compare('work',$this->work,true);

        return new CActiveDataProvider($this, array(
            'criteria'=>$criteria,
        ));
    }

    /**
     * Returns the static model of the specified AR class.
     * Please note that you should have this exact method in all your CActiveRecord descendants!
     * @param string $className active record class name.
     * @return Interests the static model class
     */
    public static function model($className=__CLASS__)
    {
        return parent::model($className);
    }
}