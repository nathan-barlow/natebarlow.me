const active_features = {
   service_price: 0,
   pages_price: 0,
   features_price: 0,
   total_price: 0,
   pages: 0,
   base_prices: {
      single: 200,
      multi: 400,
      custom: 1200,
      per_page: 200,
   },
   base_features: ["14 days support after site goes live"],
   features: [],
};

const inputs = {
   service: {
      both: {
         el: document.getElementById("service_both"),
         features: [0, 1],
      },
      design: {
         el: document.getElementById("service_design"),
         features: [0],
      },
      development: {
         el: document.getElementById("service_development"),
         features: [1],
      },
   },
   pages: {
      single: {
         el: document.getElementById("pages_single"),
         label_starting: document.getElementById("starting_single"),
         features: [],
      },
      multi: {
         el: document.getElementById("pages_multi"),
         label_starting: document.getElementById("starting_multi"),
         features: [2, 3, 4],
      },
      custom: {
         el: document.getElementById("pages_custom"),
         text_input: document.getElementById("custom_pages"),
         label_starting: document.getElementById("starting_custom"),
         features: [2, 3, 4],
      },
   },
   features: {},
};

const descriptions = {
   service: {
      both: {
         pages: {
            single:
               "A single page static website designed and developed from the ground up.",
            multi: "Just the right amount of pages for a standard website. You'll receive a fully designed and developed website suited for your business needs.",
            custom:
               "Choose as many pages as you need for your website. A website completely suited to yours or your business's needs. $1200 for 5 pages and each additional page is $200. Not sure exactly how many pages you need? Let me know in your message and I'll help you figure out exactly what you need.",
         },
         features: {
            blog: "Enhance your online presence with a custom-designed blog. Engage your audience with regular updates, news, and valuable content. I'll walk you through how to easily add new pages.",
            hosting:
               "Ensure a seamless online experience for your visitors with reliable and secure hosting services. Enjoy fast loading times and optimal performance.",
            mailing_list:
               "Build a loyal community by integrating a mailing list service, such as Brevo. Keep your audience informed with newsletters, promotions, and exclusive content.",
            contact_form:
               "Foster communication and feedback through a user-friendly contact form. Streamline inquiries and make it easy for visitors to connect with you.",
            custom_features: "",
         },
      },
      design: {
         pages: {
            single: "",
            multi: "",
            custom: "",
         },
         features: {
            blog: "Not available for projects exclusively focused on design. However, should you require blog design services, no supplementary charges will be applied.",
            hosting: "Not applicable",
            mailing_list:
               "Not available for projects exclusively focused on design. However, should your design include a mailing list form, no supplementary charges will be applied.",
            contact_form:
               "Not available for projects exclusively focused on design. However, should your design include a contact form, no supplementary charges will be applied.",
            custom_features: "Not applicable",
         },
      },
      development: {
         pages: {
            single: "",
            multi: "",
            custom: "",
         },
         features: {
            blog: "",
            hosting: "",
            mailing_list: "",
            contact_form: "",
            custom_features: "",
         },
      },
   },
};

const elements = {
   current_price: document.getElementById("current_price"),
   current_price_form: document.getElementById("current_price_form"),
   pages: document.getElementById("pages"),
   included_features: document.getElementById("included_features"),
   email_input: document.getElementById("email"),
};

const feature_list = [
   "Custom web design", // 0
   "Custom web development", // 1
   "WordPress", // 2
   "Contact form", // 3
   "SEO plugin (Yoast)", // 4
   "Blog", // 5
   "Hosting", // 6
   "Mailing list", // 7
];

// Generate Features Elements
document.querySelectorAll('input[name="features[]"]').forEach((checkbox) => {
   const featureName = checkbox.value;
   const featureId = checkbox.id;
   const featureList = checkbox.dataset.features;

   inputs.features[featureId] = {
      el: document.getElementById(featureId),
      features: JSON.parse(featureList),
   };

   // Add additional properties if needed, e.g., text_input for the custom feature
   if (featureId === "features_custom") {
      inputs.features[featureId].text_input =
         document.getElementById("custom_features");
   }
});

// Loop through each category
for (const category in inputs) {
   if (inputs.hasOwnProperty(category)) {
      const categoryObj = inputs[category];

      // Loop through each element within the category
      for (const element in categoryObj) {
         if (categoryObj.hasOwnProperty(element)) {
            const inputElement = categoryObj[element].el;

            // Determine the category and assign the corresponding event handler
            switch (category) {
               case "service":
                  inputElement.addEventListener(
                     "input",
                     handleServiceInputChange
                  );
                  break;
               case "pages":
                  inputElement.addEventListener(
                     "input",
                     handlePagesInputChange
                  );
                  break;
               case "features":
                  inputElement.addEventListener(
                     "input",
                     handleFeaturesInputChange
                  );
                  break;
               // Add more cases for additional categories if needed
            }
         }
      }
   }
}

inputs.pages.custom.text_input.addEventListener(
   "input",
   handleCustomPagesInputChange
);

updatePage();

// Function to handle service input change
function handleServiceInputChange(event) {
   const inputElement = event.target;
   const inputID = inputElement.id;
   const inputPrice = parseInt(inputElement.dataset.price);

   switch (inputID) {
      case "service_both":
         active_features.base_prices = {
            single: 500,
            multi: 750,
            custom: 1000,
            per_page: 200,
         };
         disableFeatures(null);
         break;
      case "service_design":
         active_features.base_prices = {
            single: 200,
            multi: 300,
            custom: 400,
            per_page: 50,
         };
         disableFeatures([
            "features_blog",
            "features_hosting",
            "features_mailing_list",
            "features_contact_form",
            "features_custom",
         ]);
         break;
      case "service_development":
         active_features.base_prices = {
            single: 400,
            multi: 600,
            custom: 800,
            per_page: 100,
         };
         disableFeatures(null);
         break;
      default:
         active_features.base_prices = {
            single: 200,
            multi: 300,
            custom: 400,
            per_page: 50,
         };
         disableFeatures(null);
         break;
   }

   updateDescriptions(inputID);

   for (const page in inputs.pages) {
      if (inputs.pages.hasOwnProperty(page)) {
         inputs.pages[page].el.checked = false;
      }
   }
   updateBasePagePrices();
   getBaseTotals("service", inputPrice);
   updatePage();
}

// Function to handle pages input change
function handlePagesInputChange(event) {
   const inputElement = event.target;
   const inputID = inputElement.id;
   const inputPages = inputElement.dataset.pages;

   switch (inputPages) {
      case "single":
         toggleCustomPages(false);
         active_features.pages_price = active_features.base_prices.single;
         active_features.pages = 1;
         break;
      case "multi":
         toggleCustomPages(false);
         active_features.pages_price = active_features.base_prices.multi;
         active_features.pages = "2-4";
         break;
      case "custom":
         toggleCustomPages(true);
         active_features.pages_price = active_features.base_prices.custom;
         active_features.pages = "Please enter the number of pages";
         break;
      default:
         break;
   }

   updatePage();
}

function handleCustomPagesInputChange(event) {
   const inputElement = event.target;
   const inputID = inputElement.id;
   const inputValue = parseInt(inputElement.value);
   active_features.pages = inputValue;

   getBaseTotals("pages", 1200);

   if (inputValue < 5) {
      active_features.pages =
         "Please enter a number 5 or greater or select a different pages option";
   } else if (isNaN(inputValue)) {
      active_features.pages = "Please enter a valid number";
   } else {
      let price =
         active_features.base_prices.custom +
         active_features.base_prices.per_page * (inputValue - 5);
      getBaseTotals("pages", price);
   }

   updatePage();
}

// Function to handle features input change
function handleFeaturesInputChange(event) {
   const inputElement = event.target;
   const inputID = inputElement.id;
   const inputPrice = inputElement.dataset.price;

   if (inputID == "features_custom") {
      toggleCustomFeatures(inputElement.checked);
   }

   getFeaturesTotal();
   updatePage();
}

function updatePage() {
   getTotalPrice();
   getCurrentFeatures();

   elements.current_price.innerText = `$${active_features.total_price}`;
   elements.current_price_form.value = `$${active_features.total_price}`;
   elements.pages.innerText = active_features.pages;

   elements.included_features.innerHTML = "";
   active_features.features.forEach((feature) => {
      const liElement = document.createElement("li");
      liElement.textContent = feature;
      elements.included_features.appendChild(liElement);
   });
}

function updateBasePagePrices() {
   inputs.pages.single.label_starting.innerText =
      active_features.base_prices.single;
   inputs.pages.multi.label_starting.innerText =
      active_features.base_prices.multi;

   if (active_features.base_prices.custom == "disabled") {
      inputs.pages.custom.el.disabled = true;
      if (inputs.pages.custom.el.checked) active_features.pages = 0;
      inputs.pages.custom.el.checked = false;
      toggleCustomPages(false);
   } else {
      inputs.pages.custom.el.disabled = false;
      inputs.pages.custom.label_starting.innerText =
         active_features.base_prices.custom;
   }
}

function disableCustom() {
   inputs.pages.custom.el.disabled = true;
}

function disableFeatures(features) {
   for (const feature in inputs.features) {
      if (inputs.features.hasOwnProperty(feature)) {
         inputs.features[feature].el.disabled = false;
         inputs.features[feature].el.checked = false;

         toggleCustomFeatures(false);
      }
   }

   if (features) {
      features.map((feature) => (inputs.features[feature].el.disabled = true));
   }

   getFeaturesTotal();
}

function toggleCustomPages(show) {
   inputs.pages.custom.text_input.disabled = !show;
   inputs.pages.custom.text_input.required = show;

   if (!show) {
      inputs.pages.custom.text_input.value = "";
   }
}

function toggleCustomFeatures(show) {
   inputs.features.features_custom.text_input.disabled = !show;
   inputs.features.features_custom.text_input.required = show;
}

function getBaseTotals(category, price = 0) {
   if (category == "service") {
      active_features.pages_price = 0;
      active_features.service_price = price;
   }
   if (category == "pages") active_features.pages_price = price;
}

function getFeaturesTotal() {
   active_features.features_price = 0;

   for (const feature in inputs.features) {
      if (inputs.features.hasOwnProperty(feature)) {
         const inputElement = inputs.features[feature].el;

         // Check if the feature is checked
         if (inputElement.checked) {
            // Add the price to the total
            active_features.features_price += parseFloat(
               inputElement.dataset.price
            );
         }
      }
   }
}

function getTotalPrice() {
   active_features.total_price =
      active_features.features_price +
      Math.max(active_features.service_price, active_features.pages_price);
}

function getCurrentFeatures() {
   const featureIDs = [];

   // Loop through each category
   for (const category in inputs) {
      if (inputs.hasOwnProperty(category)) {
         const categoryObj = inputs[category];

         // Loop through each element within the category
         for (const element in categoryObj) {
            if (categoryObj.hasOwnProperty(element)) {
               const inputElement = categoryObj[element].el;

               // Check if the element is checked
               if (inputElement.checked) {
                  // Add features to the array
                  featureIDs.push(...categoryObj[element].features);
               }
            }
         }
      }
   }

   active_features.features = [];

   active_features.base_features.map((feature) =>
      active_features.features.push(feature)
   );
   featureIDs.map((id) => active_features.features.push(feature_list[id]));
}

function getQuote(service) {
   let element = {
      target: inputs.service[service].el,
   };

   element.target.checked = true;
   handleServiceInputChange(element);
}

function updateDescriptions(id) {
   let category = id.split("_")[0];
   let subcategory = id.split("_")[1];
   let desc = descriptions[category][subcategory];

   for (const innerKey in desc) {
      for (const subKey in desc[innerKey]) {
         const descriptionKey = `${innerKey}_${subKey}_description`;

         let description = document.getElementById(descriptionKey);
         description.innerText = desc[innerKey][subKey];
      }
   }
}
