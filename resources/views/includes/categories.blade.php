<div style="width:60vw; height:auto;" class="mx-7 form-group d-flex flex-column p-5 bd-highlight rounded">
<label for="" style="font-size: 28px;">Categories:</label>

<div class="d-flex flex-row row py-3 justify-content-between align-items-center container ">
    <div class="form-check col-sm-3 d-flex flex-row py-2">
        {{-- Hidden filed needed to POST unchecked box value to the db --}}
        <input type="hidden" name="grammar" value="0">
        <input class="form-check-input" type="checkbox" value="1" id="grammar" name="grammar">
        <label for="grammar" class="mx-4" style="color: red">Grammar</label>
        {{-- <h5 class="mx-4" style="color: red">Grammar</h5> --}}
    </div>

    <div class="from-check">
    <div class="form-check col-sm-3 ">
        <input type="hidden" name="tenses" value="0">
        <input class="form-check-input" type="checkbox" value="1" id="tenses" name="tenses">
        <label class="form-check-label" style="color: blue; font-size: 1.1rem;" for="tenses">Tenses</label>
    </div>
    <div class="form-check col-sm-3 ">
        <input type="hidden" name="present_simple" value="0">
        <input class="form-check-input mx-2" type="checkbox" value="1" id="present_simple" name="present_simple">
        <label class="form-check-label" for="present_simple">Present Simple</label>
    </div>

    </div>
</div>

<div class="d-flex flex-row row py-3 justify-content-between align-items-center container ">
    <div class="form-check col-sm-3 d-flex flex-row py-2">
        <input type="hidden" name="vocabulary" value="0">
        <input class="form-check-input" type="checkbox" value="1" id="vocabulary" name="vocabulary">
        <label for="grammar" class="mx-4" style="color: red">Vocabulary</label>
        {{-- <h5 class="mx-4" style="color: red">Vocabulary</h5>  --}}
    </div>
    <div class="form-check col-sm-3 ">
        <input type="hidden" name="business" value="0">
        <input class="form-check-input" type="checkbox" value="1" id="business" name="business">
        <label class="form-check-label" for="">Business</label>
    </div>

</div>
</div>