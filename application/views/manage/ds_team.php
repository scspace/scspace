<nav class="navbar navbar-default navbar-static-top local-nav">
    <div class="container">
        <ul class="nav navbar-nav local-domain">
            <li><a href="/manage"> 관리 › 무예실 팀 목록 </a></li>
        </ul>
    </div>
    <div class="container">
        <hr style="margin:0;color:#353535;">
    </div>
</nav>
<div class="affix-fix"></div>

<main class="container">
    <table class="table table-hover">
        <thead>
            <tr>
                <th class="col-xs-6"> 이름 </th>
                <th class="col-xs-1"> 대표자 </th>
                <th class="col-xs-2"> 등록시간 </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($teams as $team):?>
            <tr>
                <td>
                    <a href="/dance-studio/team/<?=$team->id?>">
                        <?=$team->name?>
                    </a>
                </td>
                <td> <?=$team->delegator_id?> </td>
                <td> <?=$team->time_register?> </td>

            </tr>

            <?php endforeach;?>
        </tbody>
    </table>
</main>

