<?php

use App\User;
use App\Video;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserVideoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_video', function (Blueprint $table) {
            $table->increments('id');

            // Connected user
            $table->unsignedInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users');

            // Video
            $table->unsignedInteger('video_id');
            $table->foreign('video_id')->references('id')->on('videos');

            $table->timestamps();
        });

        $names = [
            "Dewayne Schuessler",
            "Joann Keough",
            "Katharine Knowles",
            "Renee Wison",
            "Mallory Jerkins",
            "Jarrod Liner",
            "Apolonia Mariano",
            "April Hartness",
            "Linn Migues",
            "Desirae Foulds",
            "Sherwood Fugate",
            "Irena Morgado",
            "Macie Lazar",
            "Eden Crigger",
            "Lawana Scroggins",
            "Jerald Valderrama",
            "Yetta Sedlock",
            "Lovella Ponds",
            "Ardis Guadalupe",
            "Lieselotte Slattery",
            "Leandra Corner",
            "Pat Muniz",
            "Domingo Zambrano",
            "Jong Schueller",
            "Vasiliki Nicastro",
            "Cecille Beech",
            "Trisha Mcnair",
            "Candice Rocamora",
            "Jonnie Townson",
            "Wayne Holcomb",
            "Sylvia Wegner",
            "Thu Panzer",
            "Myrtis Majeed",
            "Ola Murrin",
            "Mechelle Parshall",
            "Marlys Hazell",
            "Janna Nickell",
            "Isis Vine",
            "Madlyn Trostle",
            "Meggan Orton",
            "Jenna Brister",
            "Tonisha Avila",
            "Quincy Ryerson",
            "Shantel Azcona",
            "Cristina Carolan",
            "Melonie Farwell",
            "Jerold Robles",
            "Maurine Boothe",
            "Lesli Bonk",
            "Lara Kamerer",
            "Mike Hazelrigg",
            "Antonetta Dusseault",
            "Junita Duenas",
            "Elinore Place",
            "Kourtney Mcclean",
            "Penney Ashworth",
            "Javier Armond",
            "Pearlene Ganz",
            "Verline Dunston",
            "Sherice Hinojosa",
            "Enola Kress",
            "Johnna Enders",
            "Rosann Klenk",
            "Roberto Mcgrew",
            "Jacqulyn Bivins",
            "Julio Whitener",
            "Raisa Langham",
            "Justin Aziz",
            "Manual Dupuis",
            "Lamont Orndorff",
            "Yevette Mulloy",
            "Rafaela Lassen",
            "Barbara Orlandi",
            "Mei Marlow",
            "Ione Surrett",
            "Wilbur Elsberry",
            "Jacquelyne Costantino",
            "Izetta Royer",
            "Roselle Kuss",
            "Gertrudis Suarez",
            "Dominque Valenza",
            "Edwardo Arsenault",
            "Tierra Clay",
            "Ardella Blackstone",
            "Angela Rosebrock",
            "Jessia Atwood",
            "Sharika Beaudreau",
            "Mervin Guiterrez",
            "Sonia Phegley",
            "Shona Ussery",
            "Isa Noland",
            "Marline Tyner",
            "Tenisha Neumeister",
            "Timika Lingenfelter",
            "Daniel Tweed",
            "Sheridan Olszewski",
            "Alvin Rock",
            "Josef Gottlieb",
            "Olimpia Reda",
            "Rufus Wolken",
        ];

        $users = array();
        $length = count($names);
        for ($i = 0; $i < $length; $i++) {
            $user = new User([
                'name' => $names[$i],
            ]);
            $user->save();
            array_push($users, $user);
        }



        $movies = [
            [
                "title" => "The Founder",
                "director" => "John Lee Hancock",
                "description" => "The awesome story of McDonalds founder Ray Kroc, his problems and evolution.",
                "cast" => "Michael Keaton, Nick Offerman",
                "minutes" => 115,
                "source" => "https://www.dropbox.com/s/1wiycv091la0cnh/The%20Founder%20Official%20Trailer%20.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/The%20Founder.jpg",
            ],
            [
                "title" => "Snowden",
                "director" => "Oliver Stone",
                "description" => "The famous programmer Edward Snowden leaked the famous spy program on a large scale.",
                "cast" => "Joseph Gordon-Levitt, Shailene Woodley",
                "minutes" => 134,
                "source" => "https://www.dropbox.com/s/u9nlljdkfhpzjj0/Snowden.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/Snowden.jpg",
            ],
            [
                "title" => "Jobs",
                "director" => "Joshua Michael Stern",
                "description" => "A movie about Steve Jobs focusing on how Apple started and grew.",
                "cast" => "Ashton Kutcher, Josh Gad",
                "minutes" => 129,
                "source" => "https://www.dropbox.com/s/cxlfgxld97abvj5/Jobs.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/Jobs.jpg",
            ],
            [
                "title" => "War Dogs",
                "director" => "Todd Phillips",
                "description" => "The real story of 2 friends who started a defense company and their first contracts.",
                "cast" => "Jonah Hill, Miles Teller",
                "minutes" => 114,
                "source" => "https://www.dropbox.com/s/5379e0kl6hkmpit/War%20Dogs.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/War%20Dogs.jpg",
            ],
            [
                "title" => "The Imitation Game",
                "director" => "Morten Tyldum",
                "description" => "How Alan Turing and his team deciphered German communications in World War II to win.",
                "cast" => "Benedict Cumberbatch, Keira Knightley",
                "minutes" => 114,
                "source" => "https://www.dropbox.com/s/45kqohg5wn2dfz7/The%20Imitation%20Game.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/The%20Imitation%20Game.jpg",
            ],
            [
                "title" => "Ex Machina",
                "director" => "Alex Garland",
                "description" => "A wealthy programmer develops prototypes with advanced AI and human appearance.",
                "cast" => "Domhnall Gleeson, Alicia Vikander",
                "minutes" => 108,
                "source" => "https://www.dropbox.com/s/syzlgavvt49ihoe/Ex%20Machina.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/Ex%20Machina.jpg",
            ],
            [
                "title" => "The Social Network",
                "director" => "David Fincher",
                "description" => "The film about the creation and early evolution of Facebook.",
                "cast" => "Jesse Eisenberg, Andrew Garfield",
                "minutes" => 120,
                "source" => "https://www.dropbox.com/s/p1xdxj4g6c9qyuq/The%20Social%20Network.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/The%20Social%20Network.jpg",
            ],
            [
                "title" => "The Thirteenth Floor",
                "director" => "Josef Rusnak",
                "description" => "A philosophical film that tells the creation of a digital universe by a company.",
                "cast" => "Craig Bierko, Gretchen Mol",
                "minutes" => 100,
                "source" => "https://www.dropbox.com/s/uyoggsjlh6gyowc/The%20Thirteenth%20Floor.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/The%20Thirteenth%20Floor.jpg",
            ],
            [
                "title" => "Equity",
                "director" => "Meera Menon",
                "description" => "A film focused on investing in startups and their strategies to raise their price.",
                "cast" => "Anna Gun, James Purefoy",
                "minutes" => 100,
                "source" => "https://www.dropbox.com/s/2i2szdcfxju9cx7/Equity.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/Equity.jpg",
            ],
            [
                "title" => "The Intern",
                "director" => "Nancy Meyers",
                "description" => "To the CEO of a successful fashion startup, is assigned a fellow to delegate to him.",
                "cast" => "Robert De Niro, Anne Hathaway",
                "minutes" => 121,
                "source" => "https://www.dropbox.com/s/why2noo8j0bt7uc/The%20Intern.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/The%20Intern.jpg",
            ],
            [
                "title" => "The Fifth Estate",
                "director" => "Bill Condon",
                "description" => "The film about the origin and evolution of WikiLeaks.",
                "cast" => "Benedict Cumberbatch, Daniel Brühl",
                "minutes" => 128,
                "source" => "https://www.dropbox.com/s/r7uq8z5k9gt9yrd/The%20Fifth%20Estate.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/The%20Fifth%20Estate.jpg",
            ],
            [
                "title" => "The Internship",
                "director" => "Shawn Levy",
                "description" => "Comedy by some gentlemen who enter Google as fellows.",
                "cast" => "Vince Vaughn, Owen Wilson",
                "minutes" => 119,
                "source" => "https://www.dropbox.com/s/u3o1kft5jj413vp/The%20Internship.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/The%20Internship.jpg",
            ],
            [
                "title" => "The Wolf of Wall Street",
                "director" => "Martin Scorsese",
                "description" => "The true story of Jordan Belfort from his rise to a wealthy stock-broker without rules.",
                "cast" => "Leonardo DiCaprio, Jonah Hill",
                "minutes" => 180,
                "source" => "https://www.dropbox.com/s/t5i47wytla2odd4/The%20Wolf%20of%20Wall%20Street.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/The%20Wolf%20of%20Wall%20Street.jpg",
            ],
            [
                "title" => "Pursuit of Happyness",
                "director" => "Gabriele Muccino",
                "description" => "A real story of a sales man with little money and his dream of becoming a broker.",
                "cast" => "Will Smith, Jaden Smith",
                "minutes" => 117,
                "source" => "https://www.dropbox.com/s/s8cw27ppz8749hi/The%20Pursuit%20of%20Happyness.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/The%20Pursuit%20of%20Happyness.jpg",
            ],
            [
                "title" => "The Walk",
                "director" => "Robert Zemeckis",
                "description" => "A film based on the memories of a French wrangler and the continual challenges.",
                "cast" => "Joseph Gordon-Levitt, Charlotte Le Bon",
                "minutes" => 123,
                "source" => "https://www.dropbox.com/s/j4irgc4hbg1m9p4/The%20Walk.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/The%20Walk.jpg",
            ],
            [
                "title" => "Nightcrawler",
                "director" => "Dan Gilroy",
                "description" => "An unemployed young man discovers an opportunity after seeing an accident. ",
                "cast" => "Jake Gyllenhaal, Rene Russo",
                "minutes" => 117,
                "source" => "https://www.dropbox.com/s/5etj2v9zw53xym3/Nightcrawler.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/Nightcrawler.jpg",
            ],
            [
                "title" => "Clear History",
                "director" => "Greg Mottola",
                "description" => "The partner who sells his shares and leaves his company that makes electric cars.",
                "cast" => "Larry David, Bill Hader",
                "minutes" => 100,
                "source" => "https://www.dropbox.com/s/5uqj9ouv8ah1rfh/Clear%20History.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/Clear%20History.jpg",
            ],
            [
                "title" => "The Capital",
                "director" => "Costa-Gavras",
                "description" => "A seemingly mediocre bank employee is promoted to CEO after the death of the former.",
                "cast" => "Gabriel Byrne, Gad Elmaleh",
                "minutes" => 114,
                "source" => "https://www.dropbox.com/s/yckjbux8q5byjie/Capital.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/The%20Capital.jpg",
            ],
            [
                "title" => "Waffle Street",
                "director" => "Ian Nelms",
                "description" => "An investing fund manager remains unemployed after the financial crisis of 2008.",
                "cast" => "Danny Glover, James Lafferty",
                "minutes" => 86,
                "source" => "https://www.dropbox.com/s/cqdru62wkv3xxjk/Waffle%20Street.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/Waffle%20Street.jpg",
            ],
            [
                "title" => "Pirates of Silicon Valley",
                "director" => "Martyn Burke",
                "description" => "The film about the beginnings of Microsoft and Apple and its competition.",
                "cast" => "Noah Wyle, Anthony Michael Hall",
                "minutes" => 95,
                "source" => "https://www.dropbox.com/s/dkheatirytv0pf2/Pirates%20of%20Silicon%20Valley.mp4?dl=1",
                "thumbnail" => "/hbbtv/thumbnails/Pirates%20of%20Silicon%20Valley.jpg",
            ],
        ];

        $length = count($movies);
        for ($i = 0; $i < $length; $i++) {
            $video = new Video([
                "title" => $movies[$i]["title"],
                "director" => $movies[$i]["director"],
                "views" => random_int(10000, 50000),
                "description" => $movies[$i]["description"],
                "cast" => $movies[$i]["cast"],
                "minutes" => $movies[$i]["minutes"],
                "source" => $movies[$i]["source"],
                "thumbnail" => $movies[$i]["thumbnail"],
            ]);
            $video->save();
            $video->users()->sync([
                $users[$i*4+0]->id,
                $users[$i*4+1]->id,
                $users[$i*4+2]->id,
                $users[$i*4+3]->id,
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_video');
    }
}
