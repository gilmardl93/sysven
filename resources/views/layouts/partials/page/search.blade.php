
                            {!! Form::open(['class' => 'search-form', 'method' => 'POST', 'url' => 'buscar-producto']) !!}
                                <div class="input-group">
                                    <input type="text" class="form-control" placeholder="Ingresar nombre de producto" name="producto">
                                    <span class="input-group-btn"> 
                                        <a href="javascript:;" class="btn md-skip submit">
                                            <i class="fa fa-search"></i>
                                        </a>
                                    </span>
                                </div>
                            {!! Form::close() !!}