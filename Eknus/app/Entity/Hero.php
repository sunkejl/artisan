<?php
use Doctrine\ORM\Mapping as ORM;

/**
 *Product
 *
 * @ORM\Table(name="tb_heroes")
 * @ORM\Entity
 */
class Hero
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @var string
     *
     * @ORM\Column(name="cn_name", type="string", length=50, nullable=true)
     */
    protected $cn_name;

    /**
     * @var string
     *
     * @ORM\Column(name="coming", type="string", length=50, nullable=true)
     */
    protected $coming;


    /**
     * @var string
     *
     * @ORM\Column(name="en_name", type="string", length=50, nullable=true)
     */
    protected $en_name;
    /**
     * @var string
     *
     * @ORM\Column(name="game", type="string", length=50, nullable=true)
     */
    protected $game;
    /**
     * @var string
     *
     * @ORM\Column(name="icon", type="string", length=255, nullable=true)
     */
    protected $icon;
    /**
     * @var string
     *
     * @ORM\Column(name="img", type="string", length=255, nullable=true)
     */
    protected $img;
    /**
     * @var string
     *
     * @ORM\Column(name="log_name", type="string", length=50, nullable=true)
     */
    protected $log_name;
    /**
     * @var string
     *
     * @ORM\Column(name="role", type="string", length=50, nullable=true)
     */
    protected $role;
    /**
     * @var string
     *
     * @ORM\Column(name="share_background", type="string", length=255, nullable=true)
     */
    protected $share_background;
    /**
     * @var string
     *
     * @ORM\Column(name="standings", type="string", length=255, nullable=true)
     */
    protected $standings;
    /**
     * @var string
     *
     * @ORM\Column(name="talent_v", type="string", length=50, nullable=true)
     */
    protected $talent_v;
    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=50, nullable=true)
     */
    protected $title;
    /**
     * @var string
     *
     * @ORM\Column(name="v", type="string", length=50, nullable=true)
     */
    protected $v;
    /**
     * @var string
     *
     * @ORM\Column(name="created_at", type="datetime", length=0, nullable=true)
     */
    protected $created_at;
    /**
     * @var string
     *
     * @ORM\Column(name="updated_at", type="datetime", length=0, nullable=true)
     */
    protected $updated_at;

    /**
     * @return string
     */
    public function getCnName()
    {
        return $this->cn_name;
    }

    public function setCnName($cn_name)
    {
        $this->cn_name = $cn_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    public function setUpdatedAt()
    {
        $this->updated_at = date("Y-m-d H:i:s", time());
        return $this;
    }

    /**
     * @return string
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt()
    {
        $this->created_at = date_create(date("Y-m-d H:i:s", time()));
        return $this;
    }

    /**
     * @return string
     */
    public function getV()
    {
        return $this->v;
    }

    public function setV($v)
    {
        $this->v = $v;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    /**
     * @return string
     */
    public function getTalentV()
    {
        return $this->talent_v;
    }

    public function setTalentV($talent_v)
    {
        $this->talent_v = $talent_v;
        return $this;
    }

    /**
     * @return string
     */
    public function getStandings()
    {
        return $this->standings;
    }

    public function setStandings($standings)
    {
        $this->standings = $standings;
        return $this;
    }

    /**
     * @return string
     */
    public function getShareBackground()
    {
        return $this->share_background;
    }

    public function setShareBackground($share_background)
    {
        $this->share_background = $share_background;
        return $this;
    }

    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    public function setRole($role)
    {
        $this->role = $role;
        return $this;
    }

    /**
     * @return string
     */
    public function getLogName()
    {
        return $this->log_name;
    }

    public function setLogName($log_name)
    {
        $this->log_name = $log_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getImg()
    {
        return $this->img;
    }

    public function setImg($img)
    {
        $this->img = $img;
        return $this;
    }

    /**
     * @return string
     */
    public function getIcon()
    {
        return $this->icon;
    }

    public function setIcon($icon)
    {
        $this->icon = $icon;
        return $this;
    }

    /**
     * @return string
     */
    public function getGame()
    {
        return $this->game;
    }

    public function setGame($game)
    {
        $this->game = $game;
        return $this;
    }

    /**
     * @return string
     */
    public function getEnName()
    {
        return $this->en_name;
    }

    public function setEnName($en_name)
    {
        $this->en_name = $en_name;
        return $this;
    }

    /**
     * @return string
     */
    public function getComing()
    {
        return $this->coming;
    }

    public function setComing($coming)
    {
        $this->coming = $coming;
        return $this;
    }

}