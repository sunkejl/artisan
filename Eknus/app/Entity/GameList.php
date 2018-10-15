<?php
use Doctrine\ORM\Mapping as ORM;

/**
 *Product
 *
 * @ORM\Table(name="tb_game_lists")
 * @ORM\Entity
 */
class GameList
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;
    /**
     * @ORM\Column(type="integer")
     */
    protected $uid;
    /**
     * @ORM\Column(type="string")
     */
    protected $advert_handle_epoch;
    /**
     * @ORM\Column(type="string")
     */
    protected $advert_handle_label;
    /**
     * @ORM\Column(type="integer")
     */
    protected $advert_handle_object_id;
    /**
     * @ORM\Column(type="string")
     */
    protected $game_mode;
    /**
     * @ORM\Column(type="string")
     */
    protected $game_mode_desc;
    /**
     * @ORM\Column(type="string")
     */
    protected $game_timestamp;
    /**
     * @ORM\Column(type="string")
     */
    protected $hero_desc;
    /**
     * @ORM\Column(type="string")
     */
    protected $hero_hero;
    /**
     * @ORM\Column(type="string")
     */
    protected $hero_icon;
    /**
     * @ORM\Column(type="string")
     */
    protected $hero_level;
    /**
     * @ORM\Column(type="string")
     */
    protected $map_desc;
    /**
     * @ORM\Column(type="integer")
     */
    protected $map_id;
    /**
     * @ORM\Column(type="string")
     */
    protected $match_mvp;
    /**
     * @ORM\Column(type="string")
     */
    protected $result;
    /**
     * @ORM\Column(type="string")
     */
    protected $team_mvp;
    /**
     * @ORM\Column(type="string")
     */
    protected $win_streak;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $created_at;
    /**
     * @ORM\Column(type="datetime")
     */
    protected $updated_at;

    /**
     * @param mixed $uid
     */
    public function setUid($uid)
    {
        $this->uid = $uid;
        return $this;
    }

    /**
     * @param mixed $advert_handle_epoch
     */
    public function setAdvertHandleEpoch($advert_handle_epoch)
    {
        $this->advert_handle_epoch = $advert_handle_epoch;
        return $this;
    }

    /**
     * @param mixed $advert_handle_label
     */
    public function setAdvertHandleLabel($advert_handle_label)
    {
        $this->advert_handle_label = $advert_handle_label;
        return $this;
    }

    /**
     * @param mixed $advert_handle_object_id
     */
    public function setAdvertHandleObjectId($advert_handle_object_id)
    {
        $this->advert_handle_object_id = $advert_handle_object_id;
        return $this;
    }

    /**
     * @param mixed $game_mode
     */
    public function setGameMode($game_mode)
    {
        $this->game_mode = $game_mode;
        return $this;
    }

    /**
     * @param mixed $game_mode_desc
     */
    public function setGameModeDesc($game_mode_desc)
    {
        $this->game_mode_desc = $game_mode_desc;
        return $this;
    }

    /**
     * @param mixed $game_timestamp
     */
    public function setGameTimestamp($game_timestamp)
    {
        $this->game_timestamp = $game_timestamp;
        return $this;
    }

    /**
     * @param mixed $hero_desc
     */
    public function setHeroDesc($hero_desc)
    {
        $this->hero_desc = $hero_desc;
        return $this;
    }

    /**
     * @param mixed $hero_hero
     */
    public function setHeroHero($hero_hero)
    {
        $this->hero_hero = $hero_hero;
        return $this;
    }

    /**
     * @param mixed $hero_icon
     */
    public function setHeroIcon($hero_icon)
    {
        $this->hero_icon = $hero_icon;
        return $this;
    }

    /**
     * @param mixed $hero_level
     */
    public function setHeroLevel($hero_level)
    {
        $this->hero_level = $hero_level;
        return $this;
    }

    /**
     * @param mixed $map_desc
     */
    public function setMapDesc($map_desc)
    {
        $this->map_desc = $map_desc;
        return $this;
    }

    /**
     * @param mixed $map_id
     */
    public function setMapId($map_id)
    {
        $this->map_id = $map_id;
        return $this;
    }

    /**
     * @param mixed $match_mvp
     */
    public function setMatchMvp($match_mvp)
    {
        $this->match_mvp = $match_mvp;
        return $this;
    }

    /**
     * @param mixed $result
     */
    public function setResult($result)
    {
        $this->result = $result;
        return $this;
    }

    /**
     * @param mixed $team_mvp
     */
    public function setTeamMvp($team_mvp)
    {
        $this->team_mvp = $team_mvp;
        return $this;
    }

    /**
     * @param mixed $win_streak
     */
    public function setWinStreak($win_streak)
    {
        $this->win_streak = $win_streak;
        return $this;
    }

    /**
     * @param mixed $created_at
     */
    public function setCreatedAt()
    {
        $this->created_at = date_create(date("Y-m-d H:i:s"));
        return $this;
    }

    /**
     * @param mixed $updated_at
     */
    public function setUpdatedAt($updated_at)
    {
        $this->updated_at = $updated_at;
        return $this;
    }
}