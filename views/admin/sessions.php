<div class="modal fade" id="createSessionModal" tabindex="1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="row d-flex justify-content-center">

                <div class="col-xl-5 col-sm-10 formBackground text-center">
                    <div class="col-xl-12" id="createSessionError">
                        <p id="createSessionErrorMessage"></p>
                    </div>
                    <h2 class="mt-2" id="">Create Session</h2>
                    <form id="createSessionForm" method="POST">

                        <div class="form-group row d-flex justify-content-start text-left mb-2">
                            <div class="col-xl-3">

                                <label for="restaurantName" class="col-form-label">Restaurant</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="text" name="restaurantName" class="input-block-level text-light" placeholder="Restaurant SELECT">
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-start text-left mb-2">
                            <div class="col-xl-3">
                                    <label for="restaurantDuration" class="col-form-label">Duration</label>
                                </div>
                                <div class="col-xl-3">
                                    <input type="time" name="restaurantDuration" class="input-block-level text-light btn-dark">
                                </div>
                            </div>
                        <div class="form-group row d-flex justify-content-start text-left mb-2">
                            <div class="col-xl-3">
                                <label for="sessionDatetime" class="col-form-label">Date / Time</label>
                            </div>
                            <div class="col-xl-3">
                                <input type="date_time" name="sessionDatetime" class="input-block-level text-light btn-dark">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mb-2">
                            <div class="col-xl-8">
                                <button type="submit" class="btn purpleNoRadius text-light text-uppercase">Create Session</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="updateSessionModal" tabindex="1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="row d-flex justify-content-center">

                <div class="col-xl-5 col-sm-10 formBackground text-center">
                    <div class="col-xl-12" id="updateRestaurantError">
                        <p id="updateRestaurantErrorMessage"></p>
                    </div>
                    <h2 class="mt-2" id="">Update Session</h2>
                    <form id="updateRestaurantForm" method="POST">
                        <input type="text" id="inputRestaurantId" name="restaurantId" class="input-block-level text-light" style="display:none">
                        <div class="form-group row d-flex justify-content-start text-left mb-2">
                            <div class="col-xl-3">

                                <label for="restaurantName" class="col-form-label">Name</label>
                            </div>
                            <div class="col-xl-8">
                                <input type="text" id="inputRestaurantName" name="restaurantName" class="input-block-level text-light" placeholder="Restaurant Name">
                            </div>
                        </div>
                        <div class="form-group row d-flex justify-content-start text-left mb-2">
                            <div class="col-xl-3">
                                    <label for="restaurantDuration" class="col-form-label">Duration</label>
                                </div>
                                <div class="col-xl-3">
                                    <input type="time" name="restaurantDuration" class="input-block-level text-light btn-dark">
                                </div>
                            </div>
                        <div class="form-group row d-flex justify-content-start text-left mb-2">
                            <div class="col-xl-3">
                                <label for="sessionDatetime" class="col-form-label">Date / Time</label>
                            </div>
                            <div class="col-xl-3">
                                <input type="date_time" name="sessionDatetime" class="input-block-level text-light btn-dark">
                            </div>
                        </div>
                        <div class="row d-flex justify-content-center mb-2">
                            <div class="col-xl-8">
                                <button type="submit" class="btn purpleNoRadius text-light text-uppercase">Update Session</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<h1>Sessions</h1>
<div class="row">
    <div class="col-xl-5">
        <button type="button" class="btn purpleNoRadius text-light text-uppercase mb-2" data-toggle="modal" data-target="#createSessionModal">+ Add Session</button>
    </div>
    <div class="col-xl-12">
        <table class="table text-light table-borderless mt-2">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Restaurant</th>                    
                    <th>Date / Time</th>
                    <th>Duration</th>
                    <th>Amount Available</th>
                    <th>Price</th>                    
                    <th>Edit</th>
                    <th>Delete</th>

                </tr>
            </thead>
            <tbody>
                <?php
                $int = 0;
                foreach ($model['sessions'] as $sessions) {
                    $int = $int + 1;
                    $class = ($int % 2 == 0) ? 'normal-row' : 'dark-row';
                ?>
                    <tr class="<?= $class ?>">
                        <td><?= $sessions->getId(); ?></td>
                        <td scope="col"><?= $sessions->getTitle() ?></td>
                        <td><?= date('Y M d H:i', strtotime($sessions->getDatetime())) ?></td>
                        <td><?= date('H:i:s', strtotime($sessions->getDuration())) ?></td>
                        <td><?= $sessions->getAmountAvailable() ?></td>
                        <td><?= $sessions->getPrice() ?></td>
                        <td>
                            <button type="button" class="btn btn-dark" onclick="fillSessionForm(<?= htmlspecialchars(json_encode($sessions->jsonSerialize()),) ?>)" data-toggle="modal" data-target="#updateSessionModal"><i class="fas fa-edit fa-lg"></i></button>
                        </td>
                        <td>
                            <button type="button" class="btn btn-dark" onclick="deleteSession(<?= $sessions->getEventSessionId() ?>)"><i class="fas fa-trash fa-lg"></i></button>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>




