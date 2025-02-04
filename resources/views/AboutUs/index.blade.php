@include('Layout.header')
@php
        $data = $aboutPage->sections;
        $aboutUsSection = $data->first();
        $aboutUsSectionImages = $aboutUsSection->images;
        $ourStorySection = $data->skip(1)->first();
        $ourStorySectionImages = $ourStorySection->images;
        // $aboutUsStatus= $data->skip(2)->first();
@endphp
@include('Layout.navbar')
@include('AboutUs.Sections.ourStory', [
    'ourStorySection' => $ourStorySection,
    'ourStorySectionImages' => $ourStorySectionImages,
])
@include('AboutUs.Sections.status', [
    'customercount' => $customercount,
    'productcount' => $productcount,
    'productCategoryCount' => $productCategoryCount,
])
@include('AboutUs.Sections.aboutUs', [
    'aboutUsSection' => $aboutUsSection,
    'aboutUsSectionImages' => $aboutUsSectionImages,
])
@include('Layout.footer')

