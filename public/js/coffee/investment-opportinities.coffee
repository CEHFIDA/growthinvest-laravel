$.ajaxSetup headers: 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

$(document).ready ->
  getInvestmentOpportunity = () -> 

    $('.investment-loader').addClass('d-flex').removeClass('d-none')
    $('.no-data-conatiner').removeClass('d-flex').addClass('d-none')

    filters = {}
    filters.business_listing_type = $('input[name="business_listing_type"]').val();
    filters.order_by = $('select[name="order_by"]').val();

    status = ''
    $('input[name="tax_status[]"]').each ->
      if $(this).is(':checked')
        status += $(this).val()+','

    filters.tax_status = status

    ######***##### 
    sectors = ''
    $('input[name="business_sector[]"]').each ->
      if $(this).is(':checked')
        sectors += $(this).val()+','

    filters.sectors = sectors

    ######***##### 
    due_deligence = ''
    $('input[name="due_deligence[]"]').each ->
      if $(this).is(':checked')
        due_deligence += $(this).val()+','

    filters.due_deligence = due_deligence

    ######***##### 
    business_stage = ''
    $('input[name="business_stage[]"]').each ->
      if $(this).is(':checked')
        business_stage += $(this).val()+','

    filters.business_stage = business_stage

    ######***##### 
    funded_per = ''
    $('input[name="funded_per[]"]').each ->
      if $(this).is(':checked')
        funded_per += $(this).val()+','

    filters.funded_per = funded_per

    ######***##### 
    investment_sought = ''
    $('input[name="investment_sought[]"]').each ->
      if $(this).is(':checked')
        investment_sought += $(this).val()+','

    filters.investment_sought = investment_sought

    ######***##### 
    filters.search_title = $('input[name="search_title"]').val()
    
    ######***##### 
    
    fund_type = ''
    $('input[name="fund_type[]"]').each ->
      if $(this).is(':checked')
        fund_type += $(this).val()+','

    filters.fund_type = fund_type

    ######***##### 
    
    fund_status = ''
    $('input[name="fund_status[]"]').each ->
      if $(this).is(':checked')
        fund_status += $(this).val()+','

    filters.fund_status = fund_status

    ######***##### 
    
    fund_investmentobjective = ''
    $('input[name="fund_investmentobjective[]"]').each ->
      if $(this).is(':checked')
        fund_investmentobjective += $(this).val()+','

    filters.fund_investmentobjective = fund_investmentobjective

    ######***##### 
    vct_type = ''
    $('input[name="vct_type[]"]').each ->
      if $(this).is(':checked')
        vct_type += $(this).val()+','

    filters.vct_type = vct_type

     ######***##### 
    vct_investmentstrategy = ''
    $('input[name="vct_investmentstrategy[]"]').each ->
      if $(this).is(':checked')
        vct_investmentstrategy += $(this).val()+','

    filters.vct_investmentstrategy = vct_investmentstrategy

     ######***##### 
    vct_offeringtype = ''
    $('input[name="vct_offeringtype[]"]').each ->
      if $(this).is(':checked')
        vct_offeringtype += $(this).val()+','

    filters.vct_offeringtype = vct_offeringtype

    aic_sector = ''
    $('input[name="aic_sector[]"]').each ->
      if $(this).is(':checked')
        aic_sector += $(this).val()+','

    filters.aic_sector = aic_sector






    $.ajax
      type: 'post'
      url: '/investment-opportunities/filter-listings'
      data:filters
      success: (reponse) ->
        
        if($('.business-listing').length)
           $('.business-listing').html reponse.businesslistingHtml

          if reponse.businesslistingHtml !=""
            $('.platform-listing-section').removeClass('d-none')
          else
            $('.platform-listing-section').addClass('d-none')
          
          $('.platform-listing').html reponse.platformListingHtml

          $(".knob").knob();
          $('.investment-loader').removeClass('d-flex').addClass('d-none')

          #tooltip
          $('[data-toggle="tooltip"]').tooltip(); 

          #due diligence popover
          $('[data-toggle="popover"]').popover
            trigger: 'hover'
            html: true
            content: ->
              $('#popover-content').html()

          if(reponse.totalBusinessListings==0)
            $('.no-data-conatiner').addClass('d-flex').removeClass('d-none')

        return
      error: (request, status, error) ->
        throwError()
        return 
  
  if($('.business-listing').length)    
    getInvestmentOpportunity()
 
  $(document).on 'change', 'select[name="order_by"]', ->
    getInvestmentOpportunity()
    
  $(document).on 'change', '.filter-business-list', ->
    getInvestmentOpportunity()

  $(document).on 'click', '.search-by-title', ->
    getInvestmentOpportunity()

  $(document).on 'click', '.reset-investment-opportunity', ->
    $('input[name="tax_status[]"]').prop('checked',false)
    $('input[name="business_sector[]"]').prop('checked',false)
    $('input[name="due_deligence[]"]').prop('checked',false)
    $('input[name="business_stage[]"]').prop('checked',false)
    $('input[name="funded_per[]"]').prop('checked',false)
    $('input[name="investment_sought[]"]').prop('checked',false)
    $('input[name="search_title"]').val('')
    getInvestmentOpportunity()
    return

    