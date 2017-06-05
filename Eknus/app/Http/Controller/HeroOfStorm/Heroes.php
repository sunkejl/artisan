<?php

namespace App\Http\Controllers\HeroOfStorm;


use App\Http\Controllers\Controller;
use Curl\Curl;

class Heroes extends Controller
{
    public function indexAction()
    {
        $curl = new Curl();
        $curl->get('http://nos.netease.com/blzapp/cms/hosapp/heroes_data.json', array());
        if ($curl->error) {
            exit($curl->error_code);
        } else {
            $heroesInfo = json_decode($curl->response, true);
        }
        $entityManager = $this->getDoctrine()->getManager();
        $heroRepository = $entityManager->getRepository("Hero");
        foreach ($heroesInfo['heroes_list'] as $v) {
            $talent_v = isset($v['talent-v']) ? $v['talent-v'] : "";
            extract($v);
            if (empty($result = $heroRepository->findOneBy(['en_name' => "$enName"]))) {
                $hero = new \Hero();
                $hero
                    ->setCnName("$cnName")
                    ->setComing("$coming")
                    ->setEnName("$enName")
                    ->setGame("$game")
                    ->setIcon("$icon")
                    ->setImg("$img")
                    ->setLogName("$logName")
                    ->setRole("$role")
                    ->setShareBackground("$shareBackground")
                    ->setStandings("$standings")
                    ->setTitle("$title")
                    ->setV("$v")
                    ->setCreatedAt()
                    ->setTalentV($talent_v);
                $entityManager->persist($hero);
                $entityManager->flush();
            } else {
                $result
                    ->setCnName("$cnName")
                    ->setComing("$coming")
                    ->setEnName("$enName")
                    ->setGame("$game")
                    ->setIcon("$icon")
                    ->setImg("$img")
                    ->setLogName("$logName")
                    ->setRole("$role")
                    ->setShareBackground("$shareBackground")
                    ->setStandings("$standings")
                    ->setTitle("$title")
                    ->setV("$v")
                    ->setCreatedAt()
                    ->setTalentV($talent_v);;
                $entityManager->flush();
            }
        }
        exit;
    }

    public function get()
    {
        $curl = new Curl();
        $entityManager = $this->getDoctrine()->getManager();
        $gameListRepository = $entityManager->getRepository("GameList");

        for ($uid = 0; $uid < 31084926; $uid++) {
            echo $uid;
            #$uid = "11084926";
            $curl->get("http://sh.hosapp.blz.netease.com/hosapp-1.0/game/list?uid=$uid&hero=&mapId=0&gameMode=0&pageSize=200&pageNum=1");
            $gameListInfo = json_decode($curl->response, true);
            if (empty($pageTotal = $gameListInfo["pageTotal"])) {
                continue;
            }
            for ($i = 1; $i <= $pageTotal; $i++) {
                $curl->get("http://sh.hosapp.blz.netease.com/hosapp-1.0/game/list?uid=$uid&hero=&mapId=0&gameMode=0&pageSize=20&pageNum=1");
                if ($curl->error) {
                    exit($curl->error_code);
                } else {
                    $gameListInfo = json_decode($curl->response, true);
                }

                foreach ($gameListInfo['list'] as $v) {
                    extract($v);
                    if (empty($databaseResult = $gameListRepository->findOneBy(['advert_handle_object_id' => "{$advertHandle['objectId']}",'uid'=>"$uid"]))) {
                        $gameList = new \GameList();
                        $gameList
                            ->setUid($uid)
                            ->setAdvertHandleEpoch("{$advertHandle['epoch']}")
                            ->setAdvertHandleLabel("{$advertHandle['label']}")
                            ->setAdvertHandleObjectId("{$advertHandle['objectId']}")
                            ->setGameMode("{$gameMode}")
                            ->setGameModeDesc("{$gameModeDesc}")
                            ->setGameTimestamp("{$gameTimestamp}")
                            ->setHeroDesc("{$hero['desc']}")
                            ->setHeroHero("{$hero['hero']}")
                            ->setHeroIcon("{$hero['icon']}")
                            ->setHeroLevel("{$heroLevel}")
                            ->setMapId("{$mapId}")
                            ->setMatchMvp("{$matchMvp}")
                            ->setResult("{$result}")
                            ->setTeamMvp("{$teamMvp}")
                            ->setWinStreak("{$winStreak}")
                            ->setMapDesc("{$mapDesc}")
                            ->setCreatedAt();
                        $entityManager->persist($gameList);
                        $entityManager->flush();
                        exit;
                    } else {
                        $databaseResult
                            ->setUid($uid)
                            ->setAdvertHandleEpoch("{$advertHandle['epoch']}")
                            ->setAdvertHandleLabel("{$advertHandle['label']}")
                            ->setAdvertHandleObjectId("{$advertHandle['objectId']}")
                            ->setGameMode("{$gameMode}")
                            ->setGameModeDesc("{$gameModeDesc}")
                            ->setGameTimestamp("{$gameTimestamp}")
                            ->setHeroDesc("{$hero['desc']}")
                            ->setHeroHero("{$hero['hero']}")
                            ->setHeroIcon("{$hero['icon']}")
                            ->setHeroLevel("{$heroLevel}")
                            ->setMapId("{$mapId}")
                            ->setMatchMvp("{$matchMvp}")
                            ->setResult("{$result}")
                            ->setTeamMvp("{$teamMvp}")
                            ->setWinStreak("{$winStreak}")
                            ->setMapDesc("{$mapDesc}");
                        $entityManager->flush();
                    }
                }
            }
        }
    }
}
