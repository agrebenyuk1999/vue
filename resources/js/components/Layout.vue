<template>
    <div>
        <header>
            <div class="container">
                <div class="logo"><a href="/">ч<span class="letter__O">О</span>ткий сайт</a></div>
            </div>
        </header>
        <section>
            <div class="row">
                <div class="col-md-4 side__bar">
                    <router-link to="/mainPage">Главная</router-link>
                    <router-link to="/buy">Заказ</router-link>
                </div>
                <div class="col-md-8 content">
                    <router-view></router-view>
                </div>
            </div>
        </section>
    </div>
</template>

<script>
    export default {

    }
</script>

<style>
    header {
        height: 250px;
        background: url("http://dgdesign.ru/uploads/posts/2016-10/1477560221_gfr4.jpg");
        width: 100%;
        border-bottom: 5px solid greenyellow;
    }

    .logo {
        padding-top: 85px;
    }

    .logo a {
        color: #ffffff;
        font-size: 40px;
        border: 2px solid greenyellow;
        padding: 20px;
        text-decoration: none;
    }

    .letter__O {
        color: greenyellow;
    }

    .side__bar {
        height: 700px;
    }

    section {
        background: url("https://cdn.pixabay.com/photo/2018/04/20/18/19/grass-3336700_960_720.jpg");
        background-size: 100%;
    }

    .row {
        margin: 0;
    }

    .side__bar a {
        display: block;
        margin: 0;
        height: 150px;
        width: 100%;
        background: #000;
        color: greenyellow;
        text-align: center;
        font-size: 40px;
        border: 2px solid greenyellow;
        padding-top: 35px;
        text-decoration: none;
    }

    .side__bar a:hover {
        color: #000;
        background: greenyellow;
    }
</style>
