<div class="page page-form">
    <div class="row">
        <div class="col-md-6" data-ng-controller="formConstraintsCtrl">
            <div class="panel panel-default">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Constraints</strong></div>
                <div class="panel-body">
                    <form name="form_constraints" class="form-validation" novalidate data-ng-submit="submitForm()">
                        <div class="form-group">
                            <label for="">Required</label>
                            <input  type="text"
                                    class="form-control"
                                    required
                                    data-ng-model="form.required"
                            >
                            <br>
                            <textarea class="form-control"
                                      rows="10"
                                      required
                                      data-ng-model="form.required_textarea"></textarea>
                            <br>
                            <input  type="checkbox"
                                    id="required_checkbox"
                                    required
                                    data-ng-model="form.required_checkbox"> 
                            <label for="required_checkbox">You need to agree to the Policy</label>
                        </div>
                        <div class="form-group">
                            <label for="">Min length 3 </label>
                            <input  type="text"
                                    class="form-control"
                                    required
                                    data-ng-minlength=3
                                    data-ng-model="form.minlength"
                            >
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Max length 10</label>
                            <input  type="text"
                                    class="form-control"
                                    required
                                    data-ng-maxlength=10
                                    data-ng-model="form.maxlength"
                            >
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Length from 3 to 10</label>
                            <input  type="text"
                                    class="form-control"
                                    required
                                    data-ng-minlength=3
                                    data-ng-maxlength=10
                                    data-ng-model="form.length_rage"
                            >
                            <span></span>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6">
                                    <label for="">Type something</label>
                                    <input  type="text"
                                            class="form-control"
                                            required
                                            name="type_something"
                                            data-ng-trim='false'
                                            data-ng-model="form.type_something"
                                    >                        
                                    <span></span>
                                </div>
                                <div class="col-md-6">
                                    <label for="">Confirm type</label>
                                    <input  type="text"
                                            class="form-control"
                                            required
                                            name="confirm_type"
                                            data-ng-trim='false'
                                            data-ng-model="form.confirm_type"
                                            data-validate-equals="form.type_something"
                                    >                        
                                    <span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Equal to "foo"</label>
                            <input  type="text"
                                    class="form-control"
                                    required
                                    data-ng-model="form.foo"
                                    data-ng-pattern="/^foo$/"
                            >
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Email</label>
                            <input  type="email"
                                    class="form-control"
                                    required
                                    data-ng-model="form.email"
                            >
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Url</label>
                            <input  type="url"
                                    class="form-control"
                                    required
                                    data-ng-model="form.url"
                            >
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Must be a number</label>
                            <input  type="number"
                                    class="form-control"
                                    required
                                    name="form.num"
                                    data-ng-model="form.num"
                            >
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Number min value 3</label>
                            <input  type="number"
                                    class="form-control"
                                    required
                                    data-min=3
                                    data-ng-model="form.minVal"
                            >
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Number max value 20</label>
                            <input  type="number"
                                    class="form-control"
                                    required
                                    data-max=20
                                    data-ng-model="form.maxVal"
                            >
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Number value between 3 and 20</label>
                            <input  type="number"
                                    class="form-control"
                                    required
                                    data-min=3
                                    data-max=20
                                    data-ng-model="form.valRange"
                            >
                            <span></span>
                        </div>
                        <div class="form-group">
                            <label for="">Match a pattern, e.g. hex color code</label>
                            <input  type="text"
                                    class="form-control"
                                    placeholder="Hex color code here, like #e5e5e5, or #fff"
                                    required
                                    data-ng-pattern="/^#(?:[0-9a-fA-F]{3}){1,2}$/"
                                    data-ng-model="form.pattern"
                            >
                            <span></span>
                        </div>

                        <button type="submit"
                                class="btn btn-success"
                                data-ng-disabled="!canSubmit()"
                                >Submit</button>
                        <button class="btn btn-default"
                                data-ng-disabled="!canRevert()"
                                data-ng-click="revert()"
                        >Revert Changes</button>
                        <div class="callout callout-info">
                            <p>Submit button will be active only when all fields are valid.</p>
                            <p>Revert button will be active only when one or more fields is changed.</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Sign in Form</strong></div>
                <div class="panel-body" data-ng-controller="signinCtrl">
                    <form name="form_signin" class="form-horizontal form-validation" data-ng-submit="submitForm()">
                        <fieldset>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="">Email</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="email"
                                           class="form-control"
                                           required
                                           data-ng-model="user.email">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-3">
                                    <label for="">Password</label>
                                </div>
                                <div class="col-sm-9">
                                    <input type="password"
                                           class="form-control"
                                           required
                                           data-ng-model="user.password">
                                </div>
                            </div>
                            <button type="submit"
                                    class="btn btn-success"
                                    data-ng-disabled="!canSubmit()"
                                    >Submit</button>
                            <button class="btn btn-default"
                                    data-ng-disabled="!canRevert()"
                                    data-ng-click="revert()"
                            >Revert Changes</button>
                            <div class="callout callout-info">
                                <p>Submit button will be active only when all fields are valid.</p>
                                <p>Revert button will be active only when one or more fields is changed.</p>
                            </div>
                            <div class="divider"></div>
                            <div class="alert alert-info" data-ng-show="showInfoOnSubmit">This is just for demo. In real project, you will submit form with AJAX :)</div>
                        </fieldset>
                    </form>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading"><strong><span class="glyphicon glyphicon-th"></span> Sign up Form</strong></div>
                <div class="panel-body"  data-ng-controller="signupCtrl">
                    <form name="form_signup" class="form-horizontal form-validation" data-ng-submit="submitForm()">
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="">User Name</label>
                            </div>
                            <div class="col-sm-9">
                                <input  type="text"
                                        class="form-control"
                                        placeholder="Min length 2, Max length 30"
                                        data-ng-model="user.name"
                                        required
                                        data-ng-minlength="2"
                                        data-ng-maxlength="30">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="">Email</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="email"
                                       class="form-control"
                                       data-ng-model="user.email"
                                       required>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="">Password</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="password"
                                       class="form-control"
                                       placeholder="min length 6"
                                       data-ng-model="user.password"
                                       required
                                       data-ng-minlength="6">
                            </div>
                        </div>
<!--                         <div class="form-group">
                            <div class="col-sm-3">
                                <label for="">Confirm Password</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="password"
                                       class="form-control"
                                       data-ng-model="user.confirmPassword"
                                       required
                                       data-validate-equals="user.password">
                            </div>
                        </div> -->
                        <div class="form-group">
                            <div class="col-sm-3">
                                <label for="">Age</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="number"
                                       class="form-control"
                                       placeholder="Min value 0, max value 100"
                                       data-ng-model="user.age"
                                       required
                                       data-min="0"
                                       data-max="100">
                            </div>
                        </div>
                        <button type="submit"
                                class="btn btn-default btn-block btn-lg"
                                data-ng-disabled="!canSubmit()">Sign up</button>
                        <div class="callout callout-info">
                            <p>Submit button will be active only when all fields are valid.</p>
                        </div>
                        <div class="divider"></div>
                        <div class="alert alert-info" data-ng-show="showInfoOnSubmit">This is just for demo. In real project, you will submit form with AJAX :)</div>                 
                    </form>
                </div>
            </div>
        </div>

    </div>
</div>
