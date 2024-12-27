import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import { Link } from '@inertiajs/react';

export default function Show({ product }) {
  return (
    <AuthenticatedLayout>
      <div className="min-h-screen bg-amber-50 py-10 px-6">
        <div className="max-w-4xl mx-auto bg-white rounded-lg shadow-md p-8">
          <h1 className="text-3xl font-bold text-amber-800 mb-4">{product.name}</h1>

          {/* รูปภาพที่จัดให้อยู่ตรงกลาง */}
          <div className="flex justify-center items-center mb-6">
            <img
              src={product.images}
              alt={product.name}
              className="aspect-square w-60 h-60 rounded-md object-cover group-hover:opacity-90 xl:aspect-[7/8]"
            />
          </div>

          <p className="text-gray-700 text-lg mb-6">{product.description}</p>
          <p className="text-2xl font-semibold text-amber-900 mb-8">Price:${product.price}</p>
          <hr className="my-6" />
          <div className="text-center">
            <Link
              href="/products"
              className="inline-block px-6 py-3 text-lg font-medium text-white bg-amber-600 rounded-lg shadow hover:bg-amber-700"
            >
              Back to All Products
            </Link>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  );
}
