<?php 

    namespace App\Models;    

    class Neko {
        public static function all() {
            return [
                [
                    'id' => '1',
                    'name' => 'Mana',
                    'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit possimus, vel autem mollitia dolorum dolore aliquam distinctio inventore voluptatem incidunt eum tempore, ut pariatur sequi similique error molestias modi commodi.',
                    'img' => '/img/alvan-nee-ZCHj_2lJP00-unsplash.jpg'
                ],
                [   
                    'id' => '2',
                    'name' => 'Percy',
                    'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit possimus, vel autem mollitia dolorum dolore aliquam distinctio inventore voluptatem incidunt eum tempore, ut pariatur sequi similique error molestias modi commodi.',
                    'img' => '/img/daria-shatova-46TvM-BVrRI-unsplash.jpg'
                ],
                [   
                    'id' => '3',
                    'name' => 'Trevor',
                    'desc' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Reprehenderit possimus, vel autem mollitia dolorum dolore aliquam distinctio inventore voluptatem incidunt eum tempore, ut pariatur sequi similique error molestias modi commodi.',
                    'img' => '/img/karina-vorozheeva-rW-I87aPY5Y-unsplash.jpg'
                ]   
                ];
        }
    
        public static function find($id) {
            $nekos = self::all();
            foreach ($nekos as $neko) {
                if($neko['id'] == $id){
                    return $neko;
                }
            }
        }
    }

?>