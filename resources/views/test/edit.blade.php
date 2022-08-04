<!DOCTYPE html>
<html>
<head>
    <title>Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css"
          integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
          integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <style>
        html, body {
            min-height: 100%;
        }

        body, div, form, input, select, textarea, label, p {
            padding: 0;
            margin: 0;
            outline: none;
            font-family: Roboto, Arial, sans-serif;
            font-size: 14px;
            color: #666;
            line-height: 22px;
        }

        h1 {
            position: absolute;
            margin: 0;
            font-size: 40px;
            color: #fff;
            z-index: 2;
            line-height: 83px;
        }

        textarea {
            width: calc(100% - 12px);
            padding: 5px;
        }

        .testbox {
            display: flex;
            justify-content: center;
            align-items: center;
            height: inherit;
            padding: 20px;
        }

        form {
            width: 50%;
            padding: 20px;
            border-radius: 6px;
            background: #fff;
            box-shadow: 0 0 8px #006622;

        }

        .banner {
            position: relative;
            height: 300px;
            background-image: url("https://www.w3docs.com/uploads/media/default/0001/02/e2502bb5e1dab7d5cc9b011c745033821aad632c.jpeg");
            background-size: cover;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .banner::after {
            content: "";
            background-color: rgba(0, 0, 0, 0.2);
            position: absolute;
            width: 100%;
            height: 100%;
        }

        input, select, textarea {
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
        }

        input {
            width: calc(100% - 10px);
            padding: 5px;
        }

        input[type="date"] {
            padding: 4px 5px;
        }

        textarea {
            width: calc(100% - 12px);
            padding: 5px;
        }

        .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
            color: #006622;
        }

        .item input:hover, .item select:hover, .item textarea:hover {
            border: 1px solid transparent;
            box-shadow: 0 0 3px 0 #006622;
            color: #006622;
        }

        .item {
            position: relative;
            margin: 10px 0;
        }

        .item span {
            color: red;
        }

        input[type="date"]::-webkit-inner-spin-button {
            display: none;
        }

        .item i, input[type="date"]::-webkit-calendar-picker-indicator {
            position: absolute;
            font-size: 20px;
            color: #00b33c;
        }

        .item i {
            right: 1%;
            top: 30px;
            z-index: 1;
        }

        .week {
            display: flex;
            justfiy-content: space-between;
        }

        .colums {
            display: flex;
            justify-content: space-between;
            flex-direction: row;
            flex-wrap: wrap;
        }

        .colums div {
            width: 48%;
        }

        [type="date"]::-webkit-calendar-picker-indicator {
            right: 1%;
            z-index: 2;
            opacity: 0;
            cursor: pointer;
        }

        input[type=radio], input[type=checkbox] {
            display: none;
        }

        label.radio {
            position: relative;
            display: inline-block;
            margin: 5px 20px 15px 0;
            cursor: pointer;
        }

        .question span {
            margin-left: 30px;
        }

        .question-answer label {
            display: block;
        }

        label.radio:before {
            content: "";
            position: absolute;
            left: 0;
            width: 17px;
            height: 17px;
            border-radius: 50%;
            border: 2px solid #ccc;
        }

        input[type=radio]:checked + label:before, label.radio:hover:before {
            border: 2px solid #006622;
        }

        label.radio:after {
            content: "";
            position: absolute;
            top: 6px;
            left: 5px;
            width: 8px;
            height: 4px;
            border: 3px solid #006622;
            border-top: none;
            border-right: none;
            transform: rotate(-45deg);
            opacity: 0;
        }

        input[type=radio]:checked + label:after {
            opacity: 1;
        }

        .flax {
            display: flex;
            justify-content: space-around;
        }

        .btn-block {
            margin-top: 10px;
            text-align: center;
        }

        button {
            width: 150px;
            padding: 10px;
            border: none;
            border-radius: 5px;
            background: #006622;
            font-size: 16px;
            color: #fff;
            cursor: pointer;
        }

        button:hover {
            background: #00b33c;
        }

        @media (min-width: 568px) {
            .name-item, .city-item {
                display: flex;
                flex-wrap: wrap;
                justify-content: space-between;
            }

            .name-item input, .name-item div {
                width: calc(50% - 20px);
            }

            .name-item div input {
                width: 97%;
            }

            .name-item div label {
                display: block;
                padding-bottom: 5px;
            }
        }

    </style>
</head>
<body>
        <div class="testbox">

            <form method="get" action="update">
                @csrf
                <div class="banner">
                    <h1>{{$Title}} Form</h1>
                </div>
                <br/>
                <div>
                    @if(Session::get('success'))
                        <div class="alert alert-success">{{Session::get('success')}}</div>
                    @endif

                    @if(Session::get('fail'))
                        <div class="alert alert-danger">{{Session::get('fail')}}</div>
                    @endif
                    <div class="item">
                        <input type="hidden" name="id" value="{{$Info->id}}">
                        <label for="fname"> First Name<span>*</span></label>
                        <input id="fname" type="text" name="fname" value="{{$Info->fname}}"/>
                        <span style="color: red">@error('fname'){{$message}} @enderror</span>
                    </div>
                    <div class="item">
                        <label for="lname">Last Nmae<span>*</span></label>
                        <input id="lname" type="text" name="lname" value="{{$Info->lname}}"/>
                        <span style="color: red">@error('lname'){{$message}} @enderror</span>

                    </div>
                    <div class="item">
                        <label for="email">Email<span>*</span></label>
                        <input id="email" type="email" name="email" value="{{$Info->email}}"/>
                        <span style="color: red">@error('email'){{$message}} @enderror</span>

                    </div>
                    <div class="item">
                        <label for="bdate">Birth Date <span>*</span></label>
                        <input id="bdate" type="date" name="bdate" value="{{$Info->bdate}}"/>
                        <i class="fas fa-calendar-alt"></i>
                        <span style="color: red">@error('bdate'){{$message}} @enderror</span>

                    </div>
                    <div class="item">
                        <p>Grade</p>
                        <select name="grade">
                            <option value="{{$Info->grade}}">1st</option>
                            <option value="{{$Info->grade}}">2nd</option>
                            <option value="{{$Info->grade}}">3rd</option>
                            <option value="{{$Info->grade}}">4th</option>
                            <option value="{{$Info->grade}}">5th</option>
                        </select>
                    </div>

                </div>
                <div class="btn-block">
                    <button type="submit">Edit</button>
                </div>
            </form>
        </div>
</body>
</html>
