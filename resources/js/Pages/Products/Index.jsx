import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Link } from '@inertiajs/react';
import React from "react";

/*export default function Index({products }) {
    return(
    <>

        <h1>Product Index</h1>
        <hr />
        <div>
            <ul>
                {products.map((product) => (
                    <li key={product.id}>
                        <Link href={`/products/${product.id}`}>
                            {product.name} - ${product.price}
                        </Link>
                    </li>
                ))}
            </ul>
        </div>

    </>
    );
}*/


/*export default function Index({ products }) {
    return (
      <>
        <h1 className="text-center text-5xl font-extrabold text-white mb-8 bg-gradient-to-r from-amber-100 via-amber-150 to-amber-200 p-4 rounded-lg shadow-lg">ONLY
</h1>


        <div className="bg-amber-">

            <div className="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
              {products.map((product) => (
                <a
                  key={product.id}
                  href={product.href}
                  className="group rounded-lg p-4 bg-white shadow-md hover:shadow-lg transition-shadow"
                >
                  <img
                    alt={product.imageAlt}
                    src={product.imageSrc}
                    className="aspect-square w-full rounded-md object-cover group-hover:opacity-90 xl:aspect-[7/8]"
                  />
                  <h3 className="mt-4 text-lg font-semibold text-amber-800 group-hover:text-amber-600">
                    {product.name}
                  </h3>
                  <p className="mt-1 text-xl font-bold text-amber-900">{product.price}</p>
                </a>
              ))}
            </div>
          </div>

      </>
    );
  }*/

    export default function Index({ products })//ข้อมูลถูกส่ง
     {
        return (
            <AuthenticatedLayout>

            <h1 className="text-center text-5xl font-extrabold text-white mb-8 bg-gradient-to-r from-amber-100 via-amber-150 to-amber-200 p-4 rounded-lg shadow-lg">
              ONLY
            </h1>

            <div className="bg-amber-50 py-8 px-4">
              <div className="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
                {products.map((product) => (
                  <a
                    key={product.id}
                    href={`/products/${product.id}`}
                    className="group rounded-lg p-4 bg-white shadow-md hover:shadow-lg transition-shadow"
                  >
                    <img
                      src={product.images}
                      alt={product.name}

                      className="aspect-square w-full rounded-md object-cover group-hover:opacity-90 xl:aspect-[7/8]"
                    />

                    <h3 className="mt-4 text-lg font-semibold text-amber-800 group-hover:text-amber-600">
                      {product.name}
                    </h3>
                    <p className="mt-1 text-xl font-bold text-amber-900">${product.price}</p>
                  </a>
                ))}
              </div>
            </div>
            </AuthenticatedLayout>

        );
      }


