<?php $this->load->view("head"); ?>
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h2>Home Page</h2>
        </div>
        <div class="card-body">
            <div id="stiff-chart">
                <div class="stiff-chart-inner">

                    <?php 
                            echo '<div class="stiff-chart-level" data-level="01">
                            <button onclick="addku(0)" class="btn btn-sm btn-success">Add Family</button>
                            <div class="stiff-main-parent">
                              <ul>';
                    foreach($root as $r){
                                echo '
                                <li data-parent="x'.$r->id.'">
                                    <div class="the-chart">
                                        '.$r->nama.' <br>
                                        <div class="btn-group">
                                        <button type="button" onclick="addku('.$r->id.')" class="btn btn-sm btn-success">Add</button>
                                        <button type="button" class="btn btn-sm btn-warning">Show</button>
                                        <button type="button" onclick="deleteku('.$r->id.')" class="btn btn-sm btn-danger">Del</button>
                                    </div>
                                    </div>
                                </li>
                                ';
                            } 
                            echo '</ul>
                            </div>
                          </div>';
                    
                    ?>

                    <?php 
                    $group = $this->db->query("SELECT * FROM orang WHERE `parent` != 0 GROUP BY `parent`")->result();
                    foreach($group as $g){
                        echo '
                    <div class="stiff-chart-level" data-level="02">
                        <div class="stiff-child" data-child-from="x'.$g->parent.'">
                            <ul>';
                            $people = $this->db->get_where("orang",["parent"=>$g->parent])->result();
                            foreach($people as $p):
                            echo '<li data-parent="x'.$p->id.'">
                                <div class="the-chart">
                                '.$p->nama.'<br>
                                    <div class="btn-group">
                                        <button type="button" onclick="addku('.$p->id.')" class="btn btn-sm btn-success">Add</button>
                                        <button type="button" class="btn btn-sm btn-warning">Show</button>
                                        <button type="button" onclick="deleteku('.$p->id.')" class="btn btn-sm btn-danger">Del</button>
                                    </div>
                                </div>
                            </li>';
                            endforeach;
                            echo '</ul>
                        </div>
                        </div>
                        ';
                    }
                    ?>


                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body form-page">
                ...
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<?php $this->load->view("foot"); ?>
<script>
$(document).ready(function() {
    $('#stiff-chart').stiffChart();
});

function addku(parent) {
    $("#exampleModal").modal("toggle");
    $(".form-page").load("<?=base_url("welcome/loadadd")?>/" + parent);
}

function deleteku(id) {
    if (confirm("Ingin hapus ?") == true) {
        temajax("<?=base_url("welcome/deleteku")?>", id);
    }
}

function temajax(url, id) {
    $.ajax({
        url: url,
        type: 'post',
        data: {
            id: id
        },
        success: function(data) {
            location.reload();
        }
    });
}
</script>