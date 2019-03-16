<!DOCTYPE html>
<html lang="en">
<head>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<meta charset="utf-8">
	<title>To-Do List</title>
</head>
<body class="p-5">
<div class="mx-3">
    <h5><i class="fas fa-list-ul mr-3 "></i>To-Do List<a href="#" data-toggle="modal" data-target="#newList"><i class="fas fa-plus ml-2"></i></a></h5>
</div>

<div class="mx-3 d-flex flex-wrap">
    <?php foreach ($ListData as $List): ?>
        <div class="mx-3 d-flex">
            <ul class="list-group">
                <li onclick="setUpEditListModal(editList, '<?php echo $List["list_name"] ?>')" class="btn-primary active list-group-item d-flex justify-content-between align-items-center"><?php echo $List['list_name']?><a href="#" data-toggle="modal" data-target="#editList"><i class="fas fa-edit ml-2 text-white active"></i></a></li>
                <?php foreach ($ItemData as $Item): ?>
                <?php if($List['list_id'] === $Item['list_id']): ?>
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center"><?php echo $Item['item_name']?></li>
                <?php endif; ?>
                <?php endforeach; ?>
                            <li onclick="setUpEditListModal(NewListItem, '<?php echo $List["list_name"] ?>')" class="list-group-item d-flex justify-content-between align-items-center"><a href="#" data-toggle="modal" data-target="#NewListItem"><i class="fas fa-plus ml-2"></i>New Item</a>
                        </ul>
            </ul>
        </div>
    <?php endforeach; ?>
</div>
<!--Modal Create List-->
<form action="<?php echo base_url("Main/createList/")?>" method="post">
    <div class="modal fade" id="newList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="NewListItemTitle">New To-Do List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>List Name</h5>
                    <input name="listName" type="text" class="form-control mb-2" placeholder="List Name">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add List</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--Modal Create Item-->
<form action="<?php echo base_url("Items/createItem/")?>" method="post">
    <div class="modal fade" id="NewListItem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="NewListItemTitle">New To-Do List Item</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>Title</h5>
                    <input name="NewItemName" type="text" class="form-control mb-2" placeholder="Item Title">
                    <h5>Description</h5>
                    <input name="NewItemDetails" type="text" class="form-control mb-2" placeholder="Item Description">
                    <h5>Time</h5>
                    <input name="NewItemTime" type="number" class="form-control" placeholder="Item Time">
                    <h5>List</h5>
                    <input name="listName" type="text" class="listName form-control mb-2" value="<?php echo $List['list_id']; ?><?php echo $List['list_name']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add item</button>
                </div>
            </div>
        </div>
    </div>
</form>
<!--Model Edit List-->
<form action="<?php echo base_url("Items/createItem/")?>" method="post">
    <div class="modal fade" id="editList" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="NewListItemTitle">Edit To-Do List</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5>List Name</h5>
                    <input name="listName" type="text" class="listName form-control mb-2" value="<?php echo $List['list_name']; ?>">
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Add item</button>
                </div>
            </div>
        </div>
    </div>
</form>
<script>function setUpEditListModal(modal, listName) {
        modal.getElementsByClassName("listName")[0].value = listName;
    }</script>
</body>
</html>