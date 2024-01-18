export const BuckarooLabel = ({ image_path, title }) => {
    return (
        <div className='buckaroo_method_block'>
            {title}
            <img src={image_path} alt='Payment Method' style={{ float: 'right' }} />
        </div>
    );
};