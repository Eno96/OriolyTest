<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap" rel="stylesheet">
        <!-- Styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">       
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" rel="stylesheet">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <div class="content" style="width: 500px;">
                <form method="POST" action="addmatch">
                    {{ csrf_field() }}      
                    <a href="/" class="text-left"> < Home </a>
                    <h3 class="text-left"> Add new match </h3>
                    <div class="form-group">
                        <label for="match_winner">Match Winner</label>
                        <input name="match_winner" type="text" class="form-control"  required id="match_winner" placeholder="Winner">                         
                    </div>

                    <div class="form-group">
                        <label for="match_country">Match Country</label>
                        <input name="match_country" type="text" class="form-control" required id="match_country" placeholder="Country">                         
                    </div>

                    <div class="form-group">
                        <label for="match_year">Match Year</label>
                        <input name="match_year" type="text" class="form-control" required id="match_year" placeholder="Year">                         
                    </div> 


                    <div class="form-group">
                        <label for="match_runnerup">Match Runnerup</label>
                        <input name="match_runnerup" type="text" class="form-control" required id="match_runnerup" placeholder="Runnerup">                         
                    </div>  

                    <div class="form-group">
                        <label for="match_league_id">Match League</label>
                        <select class="form-control" name="match_league_id" required id="match_league_id">
                            <option disabled selected value="0">Select</option>
                            @foreach($leagues as $league) 
                            <option value="{{ $league->league_id }} ">{{ $league->league_name }}</option>
                            @endforeach
                        </select>
                    </div>   
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Add</button>                 
                    </div>   
                </form>
            </div>
            </div>
        </div>
    </body>
</html>



