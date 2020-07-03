<answer :answer="{{ $answer }}" inline-template>
    <div class="media post">
                                
        <vote :model="{{ $answer }}" name="answer"></vote>
    
        <div class="media-body">
            
            <form v-if="editing" @submit.prevent="update">
                <div class="form-group">
                    <textarea rows="10" v-model="body" class="form-control" required></textarea>
                </div>
                <button class="btn btn-primary" :disabled="isInvalid">Update</button>
                <button class="btn btn-outline-secondary" @click="cancel" type="button">Cancel</button>
            </form>

            <div v-else>
                {{-- {!! $answer->body_html !!} --}}
                <div v-html="bodyHtml"></div>
    
                {{-- edit and delete options --}}
                <div class="row">
                    <div class="col-4">
                        <div class="ml-auto">
                            {{-- @if (Auth::user()->can('update', $question)) --}}
                            @can ('update', $answer)
                                <a @click.prevent="edit" class="btn btn-sm btn-outline-info">Edit</a>
                            @endcan
        
                            @can ('delete', $answer)
                                <button @click="destroy" class="btn btn-sm btn-outline-danger">Delete</button>
                            @endcan
                        </div>
                    </div>
                    <div class="col-4"></div>
                    <div class="col-4">
        
                        <user-info :model="{{ $answer }}" label="Answered"></user-info>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</answer>